<?php

namespace App\Models;

use App\Traits\HasHumanNames;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory, HasHumanNames;

    protected $fillable = [
        'firstname',
        'lastname',
        'street',
        'street_number',
        'city',
        'postcode',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function full(): Attribute
    {
        return new Attribute(
            get: fn() => sprintf('%s, %s %d, %s %s', $this->fullname, $this->street, $this->street_number, $this->postcode, $this->city)
        );
    }
}
