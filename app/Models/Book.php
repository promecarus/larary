<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $dates = [
        'publication_date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "book_users")->withPivot("id", "is_returned", "created_at", "updated_at");
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, "book_genres");
    }
}