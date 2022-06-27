<?php

namespace App\Repositories;

use App\Models\Subscription;
use App\Repositories\Contracts\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function storeSubscription($data)
    {
        $subscription = Subscription::create([
            'email' => $data['email'],
            'name' => $data['name']
        ]);
        $subscription->fields()->attach($data['fields']);

        return $subscription;
    }

    public function allSubscriptions()
    {
        $subscriptions = Subscription::paginate();
        return $subscriptions;
    }

    public function updateState($subscription, $state)
    {
        $subscription->state = $state;
        $subscription->save();
        return $subscription;
    }

    public function getSubscriptionById($subscriptionId)
    {
        $subscription = Subscription::where('id', $subscriptionId)->with('fields')->first();
        return $subscription;
    }
}
