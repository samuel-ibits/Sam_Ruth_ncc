<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Webpatser\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/portalsettings/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd( $data);
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd( $data);
        $isAdmin = array_key_exists('isAdmin', $data)? $data['isAdmin']: false;
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'othernames' => $data['othernames'],
            'email' => $data['email'],
            'username' => $data['email'],
            'isAdmin' => $isAdmin,
            'email_token' => Uuid::generate()
        ]);
        $user->assignRole($data['role']);
        return $user;
    }

    /**
     * View to load user registration page
     */
    public function showRegistrationForm()
    {
        //
        $roles = Role::pluck('name','id')->all();
        //dd( array_keys($roles));
        return view('portalsettings.users.create',compact('roles'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
