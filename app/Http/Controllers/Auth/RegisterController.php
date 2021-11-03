<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserAppliance;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'reason' => ['required', 'string'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     * (redefines the method posted at vendor/laravel/ui/auth-backend/RegistersUsers.php)
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function register(Request $request)
    public function register()
    {
       $appliance_data=$this->validator(request()->all())->validate();
       $appliance_id=Str::uuid();
            UserAppliance::create([
                'id' => $appliance_id,
                'first_name' => $appliance_data['firstname'],
                'last_name' => $appliance_data['lastname'],
                'email' => $appliance_data['email'],
                'login_method' => "EMAIL",
                'reason_to_use' => $appliance_data['reason'],
            ]);

        return view("auth.appliance-registered");

        /*event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());*/

    }
}
