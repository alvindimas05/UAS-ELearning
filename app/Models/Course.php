<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'title',
        'slug',
        'thumbnail',
        'price',
        'description',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
