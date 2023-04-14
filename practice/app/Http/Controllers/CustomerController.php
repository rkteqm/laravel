<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        return view('customer.home');
    }
    public function index()
    {
        // $customers = Customer::orderBy('name')->get(); // order by name
        $customers = Customer::orderBy('id', 'desc')->get(); // order id ny descending 
        // $customers = $customers->toArray();
        // echo "<pre>";
        // // print_r($customers); // in object
        // print_r($customers->toArray()); // in array
        // die;
        // return view('customer.index')->with($users);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'profile_pic' => 'required|mimes:jpg,png,jpeg|max:2048',
                'name' => 'required',
                'email' => 'required|email|unique:customers',
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]
        );
        $fileName = time() . '.' . $request->profile_pic->extension();
        $request->profile_pic->move(public_path('assets/img/uploads'), $fileName);

        $customer = new Customer;
        $customer->profile_pic = $fileName;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->password = md5($request['password']);
        if ($customer->save()) {
            return redirect()->action([CustomerController::class, 'index']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
            ]
        );

        if ($request->email != $request->email2) {
            $request->validate(
                [
                    'email' => 'unique:customers',
                ]
            );
        }

        $customer = Customer::find($id);
        if ($request->profile_pic) {
            $request->validate(
                [
                    'profile_pic' => 'required|mimes:jpg,png,jpeg|max:2048',
                ]
            );
            $fileName = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('assets/img/uploads'), $fileName);
            $customer->profile_pic = $fileName;
        }

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        $customer->city = $request['city'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        if ($customer->save()) {
            return redirect()->action([CustomerController::class, 'index']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
