<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        return view('dashboard', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'unique:customers'],
            'for_him' => ['required'],
            'on_him' => ['required'],

        ]);
        $customer = new Customer;
        $customer->user_id = Auth::id();
        $customer->name = $request->name;
        $customer->for_him = $request->for_him;
        $customer->on_him = $request->on_him;

        $customer->save();

        return redirect('customers');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $this->validate($request, [
            'name' => ['string'],
            'avatar'=>['image']
        ]);
        if (request('for_him')) {
            $customer->name = $request->name;
        }
        if (request('for_him')) {
            $customer->for_him = $request->for_him;
        }
        if (request('on_him')) {
            $customer->on_him = $request->on_him;
        }
        if (request('avatar')) {
            $newImage = $request->avatar;
            $newImageName = time() . $newImage->getClientOriginalName();
            $newImage->move('uploads/customers/avatars/' , $newImageName);
            $customer->avatar = 'uploads/customers/avatars/' . $newImageName;
        }
        $customer->save();
        return redirect()->route('customers.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect('customers');
    }
}
