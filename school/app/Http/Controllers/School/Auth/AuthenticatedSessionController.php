<?php

namespace App\Http\Controllers\School\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SchoolLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('school.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(SchoolLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $slug = Auth::guard('school')->user()->slug;
        return redirect()->intended(RouteServiceProvider::SCHOOL_HOME."/".$slug);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('school')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect()->route('school.login');
        return redirect('/');
    }
}
