<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'price',
        'quantity',
        'pages_num',
        'published_at',
        'isbn',
        'description',
        'description_author',
        'cover_path',
        'user_id',
        'category_id',
    ]; 

    protected $dates = [
        'published_at'
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function authorsFormatted(): Attribute
    {
        return new Attribute(
            get: fn ($attibute) => substr($this->authors->implode(fn($author) => $author->fullname . ', ' ), 0, -2)
        );
    }
}
