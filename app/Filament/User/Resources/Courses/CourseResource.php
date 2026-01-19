<?php

namespace App\Filament\User\Resources\Courses;

// use App\Filament\User\Resources\Courses\Pages\CreateCourse;
// use App\Filament\User\Resources\Courses\Pages\EditCourse;
use App\Filament\User\Resources\Courses\Pages\ListCourses;
use App\Filament\User\Resources\Courses\Pages\ViewCourse;
use App\Filament\User\Resources\Courses\Schemas\CourseForm;
use App\Filament\User\Resources\Courses\Schemas\CourseInfolist;
use App\Filament\User\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Your Courses';

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('students', function ($query) {
                $query->where('user_id', \Illuminate\Support\Facades\Auth::id());
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
            'view' => ViewCourse::route('/{record}'),
        ];
    }
}
