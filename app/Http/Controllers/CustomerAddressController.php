<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Models\Address;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
{
    public function index()
    {
        return view('dashboard.addresses.index');
    }

    public function create()
    {
        return view('dashboard.addresses.create');
    }

    public function edit(CustomerAddress $address)
    {
        abort_if($address->user_id !== Auth::id(), 401);

        return view('dashboard.addresses.edit')->with('address', $address);
    }

    public function store(CreateAddressRequest $request)
    {
        $address = Address::create($request->validated());
        $customerAddress = new CustomerAddress;
        $customerAddress->type = 'shipping';
        $customerAddress->address()->associate($address);
        $customerAddress->user()->associate(Auth::user());
        $customerAddress->save();

        return redirect()->route('addresses.index');
    }

    public function update(CreateAddressRequest $request, CustomerAddress $address)
    {
        abort_if($address->user_id !== Auth::id(), 401);

        $address->address()->update($request->validated());

        return redirect()->back();
    }

    public function destroy(CustomerAddress $address)
    {
        abort_if($address->user_id !== Auth::id(), 401);

        $address->delete();

        return redirect()->route('addresses.index');
    }
}
