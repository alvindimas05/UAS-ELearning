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
            ->actions([
                Action::make('buy')
                    ->label('Buy Course')
                    ->button()
                    ->color('primary')
                    ->action(function (Course $record) {
                        $user = Auth::user();
                        
                        if ($user->purchasedCourses()->where('course_id', $record->id)->exists()) {
                            Notification::make()
                                ->title('You already own this course')
                                ->warning()
                                ->send();
                            return;
                        }

                        Transaction::create([
                            'user_id' => $user->id,
                            'course_id' => $record->id,
                            'amount' => $record->price,
                            'status' => 'success',
                        ]);

                        $user->purchasedCourses()->attach($record->id);

                        Notification::make()
                            ->title('Course purchased successfully')
                            ->success()
                            ->send();
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Buy Course')
                    ->modalDescription(fn (Course $record) => "Are you sure you want to buy '{$record->title}' for IDR " . number_format($record->price, 0, ',', '.') . "?")
                    ->modalSubmitActionLabel('Buy Now'),
            ]);
    }
}
