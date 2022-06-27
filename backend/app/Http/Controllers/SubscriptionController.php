<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Repositories\Contracts\SubscriptionRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    private $subscriptions;

    public function __construct(SubscriptionRepositoryInterface $subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->subscriptions->allSubscriptions();
            return $this->sendApiResponse(Response::HTTP_OK, __('records fetched successfully'), $data);
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return $this->sendApiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, __('error occurred'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        try {
            $data = $request->validated();
            $response = $this->subscriptions->storeSubscription($data);
            return $this->sendApiResponse(Response::HTTP_CREATED, __('subscribed successfully'), $response);
        } catch (ValidationException $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return $this->sendApiResponse(Response::HTTP_FORBIDDEN, __($e->getMessage()));
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return $this->sendApiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, __($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $subscription = $this->subscriptions->getSubscriptionById($id);

            if (!isset($subscription)) {
                return $this->sendApiResponse(Response::HTTP_NOT_FOUND, __('Subscription not found'));
            }
            return $this->sendApiResponse(Response::HTTP_OK, __('Subsription fetched successfully'), $subscription);
        } catch (Exception $e) {
            Log::error($e->getMessage(),$e->getTrace());
            return $this->sendApiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, __('error_occurred'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, $id)
    {
        try {
            $subscription = $this->subscriptions->getSubscriptionById($id);

            if (!isset($subscription)) {
                return $this->sendApiResponse(Response::HTTP_NOT_FOUND, __('Subscription not found'));
            }

            $state = $request->validated()['state'];

            $this->subscriptions->updateState($subscription, $state);

            return $this->sendApiResponse(Response::HTTP_OK, __('Subscription state updated successfully'), $subscription);
        } catch (Exception $e) {
            dump($e->getMessage());
            Log::error($e->getMessage(),$e->getTrace());
            return $this->sendApiResponse(Response::HTTP_INTERNAL_SERVER_ERROR, __('error_occurred'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
