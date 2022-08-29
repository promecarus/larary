<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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
}