<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const ACTIVE = 'active';
    const UNSUBSCRIBED = 'unsubscribed';
    const JUNK = 'junk';
    const BOUNCED = 'bounced';
    const UNCONFIMERD = 'unconfirmed';

    public function fields()
    {
        return $this->belongsToMany(Field::class, 'subscription_fields')->withPivot(['value']);
    }
}
