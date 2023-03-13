<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
         "title", "picture", "content" ];

    public function comments()
    {
        return $this->morphMany ('App\Models\Comments', "comment")->latest();
    }
}
