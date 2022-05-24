<?php

namespace App\Traits;

trait HasHumanNames
{
    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}