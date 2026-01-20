<?php

namespace App\Filament\User\Resources\Courses\Pages;

use App\Filament\User\Resources\Courses\CourseResource;
use Filament\Resources\Pages\ListRecords;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
