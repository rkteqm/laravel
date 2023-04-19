<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(Request $request)
    {
        if ($request->isMethod('post')) {
            return redirect('')->with('success', "Post method is hitted");
        } else {
            return view('customer.home');
        }
    }
    public function index(Request $request)
    {

        if (Auth::check()) {
            $search = $request['search'] ?? "";
            if ($search != "") {
                // $customers = Customer::where('name', '=', $search)->get(); //search only exact match
                // $customers = Customer::where('name', 'LIKE', "%$search")->get(); //search exact match of letter at the end
                // $customers = Customer::where('name', 'LIKE', "%$search%")->get(); //search anywhere in the name
                $customers = Customer::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get(); //search anywhere in the name or email
            } else {
                // $customers = Customer::all(); 
                // $customers = Customer::get(); 
                $customers = Customer::paginate(10);
            }

            $data = compact('customers', 'search');
            return view('customer.index')->with($data);
        } else {
            return redirect()->route('welcome');
        }

        // $customers = Customer::orderBy('name')->get(); // order by name
        // $customers = Customer::where('soft_delete', 1)->orderBy('id', 'desc')->get(); // order id by descending 
        // p($customers); // printing using custom helper
        // $customers = $customers->toArray();
        // echo "<pre>";
        // // print_r($customers); // in object
        // print_r($customers->toArray()); // in array
        // die;
        // return view('customer.index')->with($users);
        // return view('customer.index', compact('customers'));
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
            return redirect()->action([CustomerController::class, 'index'])->with('success', 'Customer updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            // hard delete
            // $customer->delete(); 

            // soft delete manually
            $customer->soft_delete = 0;
            if ($customer->save()) {
                return redirect()->action([CustomerController::class, 'index']);
            }
        }
        return redirect()->action([CustomerController::class, 'index']);
    }

    public function trash(string $id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }
        return redirect()->action([CustomerController::class, 'index'])->with('success', 'Moved to trash successfully');
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
        return redirect('customer/trashdata')->with('success', 'Customer restored successfully');
    }

    // for permanent delete
    public function pdelete(string $id)
    {
        $customer = Customer::withTrashed()->find($id);
        if (!is_null($customer)) {
            $customer->forceDelete();
        }
        return redirect('customer/trashdata');
    }

    // file upload functional
    public function storefile(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            ]
        );

        // p($request->all()); //custom helper funtion p()
        // echo $request->file('image')->store('public/uploads'); //upload image with laravel unique file name
        $fileName = time() . "-rs." . $request->file('image')->getClientOriginalExtension(); //upload image with custom name
        echo $request->file('image')->storeAs('public/uploads', $fileName);
        return redirect('customer/upload')->with('success', 'Image uploaded successfully');
    }

    // public function login(Request $request)
    // {
    //     p($request->all());
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('customer');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
