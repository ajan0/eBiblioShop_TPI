<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $dates = [
        'publish_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function uploaded_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
