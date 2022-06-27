<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    const DATE = 'date';
    const NUMBER = 'number';
    const STRING = 'string';
    const BOOLEAN = 'boolean';

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_fields');
    }
}
