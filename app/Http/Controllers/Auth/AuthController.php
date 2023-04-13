<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Write code on Method
     *
     * @return response()
     */
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


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in !!!');
        }

            return redirect('login')->with('failed','Opps! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
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

                'Country' => 'required',

                'State' => 'required',

                'City' => 'required',

                'remember' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully logged in !!!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'Employee_ID' => "SIPL".$data['Employee_ID'],
        'name' => $data['name'],
        'empDOB' => $data['empDOB'],
        'email' => $data['email'],
        'empGender' => $data['empGender'],
        'empAddress' => $data['empAddress'],
        'Country' => $data['Country'],
        'State' => $data['State'],
        'City' => $data['City'],
        'password' => Hash::make($data['password']),
        'remember' => $data['remember']
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
