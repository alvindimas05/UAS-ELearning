<?php

namespace App\Filament\User\Pages;

use App\Models\Course;
use App\Models\Transaction;
use Filament\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

use BackedEnum;
use App\Filament\User\Resources\Courses\CourseResource;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

class CourseCatalog extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $title = 'Course Catalog';

    protected string $view = 'filament.user.pages.course-catalog';

    public function table(Table $table): Table
    {
        return $table
            ->query(Course::query())
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Stack::make([
                    ImageColumn::make('thumbnail')
                        ->height('200px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-t-lg']),
                    TextColumn::make('title')
                        ->weight('bold')
                        ->size('lg')
                        ->searchable(),
                    TextColumn::make('price')
                        ->money('IDR')
                        ->color('success')
                        ->weight('bold'),
                    TextColumn::make('teacher.name')
                        ->icon('heroicon-m-user')
                        ->color('gray'),
                ])->space(3),
            ])
            ->recordActions([
                ViewAction::make('preview')
                    ->label('Preview')
                    ->color('gray')
                    ->button()
                    ->modalHeading('Course Preview')
                    ->schema(fn ($infolist) => $infolist
                        ->schema([
                            ImageEntry::make('thumbnail')
                                ->hiddenLabel()
                                ->imageHeight(200)
                                ->imageWidth('100%')
                                ->extraImgAttributes(['class' => 'object-cover rounded-lg']),

                            Section::make('Course Details')
                                ->schema([
                                    TextEntry::make('title')
                                        ->weight('bold')
                                        ->size('lg'),
                                    TextEntry::make('description')
                                        ->markdown(),
                                ])->collapsed(false),

                            Section::make('Contents')
                                ->schema([
                                    RepeatableEntry::make('contents')
                                        ->schema([
                                            TextEntry::make('title')
                                                ->label('Title'),
                                            TextEntry::make('type')
                                                ->badge()
                                                ->color(fn (string $state): string => match ($state) {
                                                    'video' => 'success',
                                                    'text' => 'info',
                                                    default => 'gray',
                                                }),
                                        ])
                                        ->columns(2)
                                ])->collapsed(true)
                        ])
                    ),
                Action::make('view_course')
                    ->label('View')
                    ->button()
                    ->color('success')
                    ->icon('heroicon-m-eye')
                    ->url(fn (Course $record) => CourseResource::getUrl('view', ['record' => $record]))
                    ->visible(fn (Course $record) => Auth::user()->purchasedCourses()->where('course_id', $record->id)->exists()),
                Action::make('buy')
                    ->label('Buy Course')
                    ->button()
                    ->color('primary')
                    ->icon('heroicon-m-shopping-cart')
                    ->visible(fn (Course $record) => ! Auth::user()->purchasedCourses()->where('course_id', $record->id)->exists())
                    ->action(function (Course $record, \Livewire\Component $livewire) {
                        $user = Auth::user();
                        
                        // Check if user already owns the course
                        if ($user->purchasedCourses()->where('course_id', $record->id)->exists()) {
                            Notification::make()
                                ->title('You already own this course')
                                ->warning()
                                ->send();
                            return;
                        }

                        // Create pending transaction
                        $orderId = 'ORD-' . uniqid() . '-' . time();
                        $transaction = Transaction::create([
                            'user_id' => $user->id,
                            'course_id' => $record->id,
                            'amount' => $record->price,
                            'status' => 'pending',
                            'midtrans_order_id' => $orderId,
                        ]);

                        // // Determine Midtrans config
                        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
                        // \Midtrans\Config::$isProduction = config('midtrans.is_production');
                        // \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
                        // \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

                        $params = [
                            'transaction_details' => [
                                'order_id' => $orderId,
                                'gross_amount' => (int) $record->price,
                            ],
                            'customer_details' => [
                                'first_name' => $user->name,
                                'email' => $user->email,
                            ],
                            'item_details' => [
                                [
                                    'id' => $record->id,
                                    'price' => (int) $record->price,
                                    'quantity' => 1,
                                    'name' => substr($record->title, 0, 50),
                                ]
                            ]
                        ];

                        try {
                            $snapToken = \Midtrans\Snap::getSnapToken($params);
                            
                            $transaction->update(['snap_token' => $snapToken]);
                            
                            // Open Snap Popup
                            $livewire->dispatch('openSnapPayment', $snapToken);

                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Payment Error')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Buy Course')
                    ->modalDescription(fn (Course $record) => "Are you sure you want to buy '{$record->title}' for IDR " . number_format($record->price, 0, ',', '.') . "?")
                    ->modalSubmitActionLabel('Buy Now'),
            ]);
    }

    public function handlePaymentSuccess($result)
    {
        $orderId = $result['order_id'];
        $transaction = Transaction::where('midtrans_order_id', $orderId)->first();

        if ($transaction) {
            $transaction->update([
                'status' => 'success',
                'midtrans_transaction_id' => $result['transaction_id'],
                'midtrans_payment_type' => $result['payment_type'],
                'midtrans_gross_amount' => $result['gross_amount'],
            ]);

            // Attach course to user if not already attached
            $user = Auth::user();
            if (!$user->purchasedCourses()->where('course_id', $transaction->course_id)->exists()) {
                $user->purchasedCourses()->attach($transaction->course_id);
            }

            Notification::make()
                ->title('Payment Successful')
                ->body('You have successfully purchased the course.')
                ->success()
                ->send();
            
            $this->dispatch('paymentSuccess', ['redirect' => CourseResource::getUrl('index')]);
        }
    }
}
