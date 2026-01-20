<?php

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Article;
use Balintcodes\FilamentEnhancedDatalist\FilamentEnhancedDatalist;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    FilamentEnhancedDatalist::make('category')
                        ->label('Category')
                        ->infoLabel('Select or create a category')
                        ->options(
                            fn() => array_values(collect(Article::distinct()->pluck('category')->filter())->mapWithKeys(fn($category) => [$category => $category])->toArray())
                        )
                        ->required(),
                ]),
                Section::make([
                    FileUpload::make('image')
                        ->required()
                        ->image()
                        ->directory('articles'),
                ]),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
