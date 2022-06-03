<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'status'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function book_owner()
    {
        return $this->book->user();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
