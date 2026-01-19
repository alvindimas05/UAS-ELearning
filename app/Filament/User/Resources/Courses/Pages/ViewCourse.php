<?php

namespace App\Filament\User\Resources\Courses\Pages;

use App\Filament\User\Resources\Courses\CourseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCourse extends ViewRecord
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
