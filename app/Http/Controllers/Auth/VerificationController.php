<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route as FacadesRoute;

class VerificationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */

    protected $redirectTo = '/dashboards';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Request $request )
    {
        if($request->route('id')){
            Auth::logout();
            $user = User::find($request->route('id'));
            //dd($user);
            Auth::guard()->login($user);
        }
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        //dd($this);
    }

    public function show(Request $request)
    {
        //dd($this->redirectPath(), $request);
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.verify');
    }

    public function verify(Request $request)
    {
        $allRoutes = FacadesRoute::getRoutes();
        //dd($allRoutes);
        $url = url()->current(); // get the base URL - everything to the left of the "?"
        $query = request()->query(); // get the query parameters (what follows the "?")

        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }
        $user = $request->user();

        return $user->hasVerifiedEmail()
                    ? redirect($this->redirectPath())
                    :view('auth.verify', compact('user', 'url', 'query'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed'
        ]);

        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey()))
        {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification())))
        {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail())
        {
            return redirect($this->redirectPath());
        }

        $user = $request->user();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        if($request->user()->markEmailAsVerified())
        {
            event(new Verified($request->user()));
        }
        return redirect($this->redirectPath())->with('verified', true);
    }

    public function resend(Request $request)
    {
        if($request->has('resendverification')){
            $newuser = User::find($request->input('newuser'));
            $newuser->sendEmailVerificationNotification();
            $newuser->email_verified_at = null;
            $newuser->save();
            return redirect()->route('users.index')
                            ->with('success','Verification Link resent');
        }
        else if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
