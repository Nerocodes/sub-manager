<?php

namespace App\Providers;

use App\Repositories\Contracts\SubscriptionRepositoryInterface;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
       SubscriptionRepositoryInterface::class => SubscriptionRepository::class
    ];
}
