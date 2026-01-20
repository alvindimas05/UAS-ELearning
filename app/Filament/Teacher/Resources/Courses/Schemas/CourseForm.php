<?php

namespace App\Filament\Teacher\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Information')
                    ->schema([
                        Hidden::make('teacher_id')
                            ->default(auth()->id()),
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        FileUpload::make('thumbnail')
                            ->required()
                            ->image()
                            ->directory('course-thumbnails'),
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('IDR')
                            ->default(0),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(false)
                    ->columnSpanFull(),
                Section::make('Contents')
                    ->schema([
                        Repeater::make('contents')
                            ->relationship()
                            ->collapsed(true)
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->schema([
                                TextInput::make('title')->required()->live(onBlur: true),
                                Select::make('type')
                                    ->options([
                                        'text' => 'Text',
                                        'video' => 'Video',
                                        'youtube' => 'Youtube',
                                    ])
                                    ->default('text')
                                    ->live()
                                    ->required(),
                                FileUpload::make('file_path')
                                    ->label('Content File (Video/Image)')
                                    ->required(fn (Get $get) => $get('type') !== 'youtube')
                                    ->visible(fn (Get $get) => $get('type') !== 'youtube')
                                    ->acceptedFileTypes(['video/mp4', 'image/jpeg', 'image/png'])
                                    ->directory('course-contents'),
                                TextInput::make('url')
                                    ->label('Youtube URL')
                                    ->required(fn (Get $get) => $get('type') === 'youtube')
                                    ->visible(fn (Get $get) => $get('type') === 'youtube')
                                    ->url()
                                    ->placeholder('https://www.youtube.com/watch?v=...'),
                                RichEditor::make('description')
                                    ->columnSpanFull(),
                            ])
                            ->orderColumn('sort_order')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(true)
                    ->columnSpanFull(),
            ]);
    }
}
