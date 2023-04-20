<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('customer.home');
    }
    public function loginview()
    {
        return view('customer.login');
    }
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $customers = Customer::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get(); //search anywhere in the name or email
        } else {
            $customers = Customer::paginate(10);
        }

        $data = compact('customers', 'search');
        return view('customer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registerview()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        // echo "register";
        // die;
        // return view('customer.register');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'confirm_password' => 'required|same:password',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('login')->with('success', 'User has been saved successfully');
    }

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
                'password' => [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                    // ->uncompromised() // for not use rare password like Abcd@123
                ],
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
            return redirect()->action([CustomerController::class, 'index'])->with('success', 'Customer has been saved');
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

    //  Customer edit view page
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */

    //  handle edit customer details
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
            return redirect()->action([CustomerController::class, 'index'])->with('success', 'Customer updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    //  move to trash
    public function trash(string $id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect()->back()->with('success', 'Moved to trash successfully');
        // return redirect()->action([CustomerController::class, 'index'])->with('success', 'Moved to trash successfully');
    }

    // trash listing
    public function trashdata()
    {
        $customers = Customer::onlyTrashed()->get();

        return view('customer.trashdata', compact('customers'));
    }

    // for restore trash data
    public function restore(string $id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->restore();
        }
        return redirect()->back()->with('success', 'Customer restored successfully');
    }

    // for permanent delete
    public function pdelete(string $id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect()->back();
    }

    // handle login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // for logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
