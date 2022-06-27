<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface SubscriptionRepositoryInterface
{
    public function storeSubscription($data);

    public function allSubscriptions();

    public function updateState($subscription, $state);

    public function getSubscriptionById($subscriptionId);
}
