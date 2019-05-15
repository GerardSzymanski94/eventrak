<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserInfo;
use GusApi\Exception\InvalidUserKeyException;
use GusApi\GusApi;
use Illuminate\Support\Facades\Hash;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $gus = new GusApi('abcde12345abcde12345', 'dev');

        try {
            $nipToCheck = 5250007738;
            $gus->login();
            $gusReports = $gus->getByNip($data['nip']);
            if (count($gusReports) > 1) {
                die();
            } else {
                $gusReport = $gusReports[0];
            }
        } catch (InvalidUserKeyException $e) {
            die();
            echo 'Bad user key';
        } catch (\GusApi\Exception\NotFoundException $e) {
            die();
            echo 'No data found <br>';
            echo 'For more information read server message below: <br>';
            echo $gus->getResultSearchMessage();
        }

        $user = User::create([
            'name' => $data['nip'],
            'nip' => $data['nip'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'admin' => 0,
            'password' => Hash::make($data['password']),
        ]);

        UserInfo::create([
            'user_id' => $user->id,
            'nip' => $user->nip,
            'regon' => $gusReport->getRegon(),
            'regon14' => $gusReport->getRegon14(),
            'name' => $gusReport->getName(),
            'province' => $gusReport->getProvince(),
            'district' => $gusReport->getDistrict(),
            'community' => $gusReport->getCommunity(),
            'city' => $gusReport->getCity(),
            'zipCode' => $gusReport->getZipCode(),
            'street' => $gusReport->getStreet(),
            'type' => $gusReport->getType(),
            'silo' => $gusReport->getSilo(),
        ]);
        return $user;
    }
}
