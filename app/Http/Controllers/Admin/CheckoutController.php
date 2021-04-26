<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCheckoutRequest;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;
use App\Models\Checkout;
use App\Models\Location;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('checkout_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkouts = Checkout::with(['user', 'location'])->get();

        $users = User::get();

        $locations = Location::get();

        return view('admin.checkouts.index', compact('checkouts', 'users', 'locations'));
    }

    public function create()
    {
        abort_if(Gate::denies('checkout_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.checkouts.create', compact('users', 'locations'));
    }

    public function store(StoreCheckoutRequest $request)
    {
        $checkout = Checkout::create($request->all());

        return redirect()->route('admin.checkouts.index');
    }

    public function edit(Checkout $checkout)
    {
        abort_if(Gate::denies('checkout_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $locations = Location::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checkout->load('user', 'location');

        return view('admin.checkouts.edit', compact('users', 'locations', 'checkout'));
    }

    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        $checkout->update($request->all());

        return redirect()->route('admin.checkouts.index');
    }

    public function show(Checkout $checkout)
    {
        abort_if(Gate::denies('checkout_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkout->load('user', 'location');

        return view('admin.checkouts.show', compact('checkout'));
    }

    public function destroy(Checkout $checkout)
    {
        abort_if(Gate::denies('checkout_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkout->delete();

        return back();
    }

    public function massDestroy(MassDestroyCheckoutRequest $request)
    {
        Checkout::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
