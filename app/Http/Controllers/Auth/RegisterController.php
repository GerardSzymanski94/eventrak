<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserBase;
use App\UserInfo;
use GusApi\Exception\InvalidUserKeyException;
use GusApi\GusApi;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data, $address)
    {
        $user = User::create([
            'name' => $data['name'],
            'nip' => $data['nip'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'admin' => 0,
            'password' => '1qazxsw2'
        ]);

        UserInfo::create([
            'user_id' => $user->id,
            'nip' => $user->nip,
            'regon' => '---',
            'regon14' => '---',
            'name' => $address->firma_nazwa,
            'province' => '---',
            'district' => '---',
            'community' => '---',
            'city' => $address->miejscowosc,
            'zipCode' => $address->kod_pocztowy,
            'street' => $address->ulica,
            'type' => '---',
            'silo' => '---',
        ]);
        return $user;
    }

    public function register_post(Request $request)
    {
        //$this->validator($request->all())->validate();
        /*$gus = new GusApi('abcde12345abcde12345', 'dev');

        try {
            $nipToCheck = 5250007738;
            $gus->login();
            $gusReports = $gus->getByNip($request->nip);
            if (count($gusReports) > 1) {
                Session::flash('error_nip', 'Niepoprawny NIP');
                return redirect()->route('register')->with('error_nip', 'Niepoprawny NIP');
            } else {
                $gusReport = $gusReports[0];
            }
        } catch (InvalidUserKeyException $e) {
            Session::flash('error_nip', 'Niepoprawny NIP');
            return redirect()->route('register')->with('error_nip', 'Niepoprawny NIP');
            echo 'Bad user key';
        } catch (\GusApi\Exception\NotFoundException $e) {
            Session::flash('error_nip', 'Niepoprawny NIP');
            return redirect()->route('register')->with('error_nip', 'Niepoprawny NIP');
            echo 'No data found <br>';
            echo 'For more information read server message below: <br>';
            echo $gus->getResultSearchMessage();
        }*/

        $address = UserBase::find($request->address_id);

        event(new Registered($user = $this->create($request->all(), $address)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect()->route('photo.add');
    }

    public function select_address(Request $request)
    {
        $this->validator($request->all())->validate();
        $addresses = UserBase::where('nip', $request->nip)->get();

        if (count($addresses) < 1) {
            return redirect()->route('/')->with('error', 'Nie znaleziono NIP');
        }

        $nip = $request->nip;
        $email = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        //$password = Hash::make($request->password);
        return view('adressPage', compact('nip', 'email', 'name', 'phone', 'password', 'addresses'));

        dd(count($addresses));
    }
}
