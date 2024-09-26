<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Http\Resources\Admin\CheckoutResource;
use App\Models\Checkout;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('checkout_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckoutResource(Checkout::with(['user', 'location'])->get());
    }

    public function store(StoreCheckoutRequest $request)
    {
        $checkout = Checkout::create($request->all());

        return (new CheckoutResource($checkout))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Checkout $checkout)
    {
        abort_if(Gate::denies('checkout_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckoutResource($checkout->load(['user', 'location']));
    }

    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        $checkout->update($request->all());

        return (new CheckoutResource($checkout))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Checkout $checkout)
    {
        abort_if(Gate::denies('checkout_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkout->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
