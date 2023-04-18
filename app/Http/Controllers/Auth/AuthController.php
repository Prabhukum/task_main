<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Session;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Hash;
use DB;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    public function registration()

    {

        $countries= $this->getCountries();
        return view('auth.registration',['countries'=>$countries]);
    }


    public function getCountries(){
        $countries = DB::table('countries')->get();

        return $countries;
    }
    public function getStates(Request $request){
        $states = DB::table('states')->where('country_id',$request->country_id)->get();

        if(count($states)>0){
            return response()->json($states);
        }
    }
    public function getCities(Request $request){
        $cities = DB::table('cities')->where('state_id',$request->state_id)->get();

        if(count($cities)>0){
            return response()->json($cities);
        }
    }

    public function postLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->intended('/contact')
                        ->withSuccess('You have Successfully logged In');



        }

            return redirect('login')->with('failed','Opps! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
                'Employee_ID' => 'required',

                'name' => 'required',

                'empDOB' => 'required',

                'email' => 'required|email|unique:users',

                'password' => 'required|min:6',

                'empGender' => 'required',

                'empAddress' => 'required',

                'country' => 'required',

                'state' => 'required',

                'city' => 'required',

                'remember' => 'required',
        ]);


        $selectCountry = DB::table('countries')
        ->where('id', $request->input("country"))
        ->get()
        ->first();

        $selectState = DB::table('states')
                ->where('id', $request->input("state"))
                ->get()
                ->first();
        $selectCity   = DB::table('cities')
                ->where('id', $request->input("city"))
                ->get()
                ->first();

        $data = $request->all();

        $data['country'] = $selectCountry->name;
        $data['state'] = $selectState->name;
        $data['city'] = $selectCity->name;

        $check = $this->create($data);



        return redirect("login")->withSuccess('Great! You have Successfully logged In');

    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('/contact');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {

      return User::create([
        'Employee_ID' => "SIPL".$data['Employee_ID'],
        'name' => $data['name'],
        'empDOB' => $data['empDOB'],
        'email' => $data['email'],
        'empGender' => $data['empGender'],
        'empAddress' => $data['empAddress'],
        'country' => $data['country'],
        'state' => $data['state'],
        'city' => $data['city'],
        'password' => Hash::make($data['password']),
        'remember' => $data['remember']
      ]);
    }
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
