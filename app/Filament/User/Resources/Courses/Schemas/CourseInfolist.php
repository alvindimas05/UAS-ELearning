<?php

namespace App\Filament\User\Resources\Courses\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Details')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('title')
                            ->size('lg')
                            ->weight('bold'),
                        \Filament\Infolists\Components\TextEntry::make('teacher.name')
                            ->label('Teacher'),
                        \Filament\Infolists\Components\TextEntry::make('description')
                            ->markdown()
                            ->columnSpanFull(),
                    ])
                    ->collapsed(false)
                    ->columnSpanFull(),
                
                Section::make('Course Content')
                    ->schema([
                        \Filament\Infolists\Components\RepeatableEntry::make('contents')
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('title')
                                    ->weight('bold'),
                                \Filament\Infolists\Components\TextEntry::make('type')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'video' => 'success',
                                        'text' => 'info',
                                        default => 'gray',
                                    }),
                                \Filament\Infolists\Components\TextEntry::make('description')
                                    ->markdown()
                                    ->columnSpanFull(),
                                \Filament\Infolists\Components\TextEntry::make('file_path')
                                    ->label('Content URL')
                                    ->url(fn ($state) => $state ? Storage::url($state) : null, true)
                                    ->visible(fn ($record) => $record->type === 'video' || $record->file_path),
                            ])
                            ->grid(1)
                            ->columnSpanFull(),
                    ])
                    ->collapsed(true)
                    ->columnSpanFull(),
            ]);
    }
}
