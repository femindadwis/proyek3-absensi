<?php

namespace App\Http\Controllers\Auth;
use JWTAuth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1  ) {
                return redirect('/');
            }else if (auth()->user()->is_admin == 2 ) {
                return redirect('/'); 
            }else{
            Auth::logout();
                return  redirect('login')
                ->with('error','Hak Akses Masuk DiTolak.');;
            }
        }else{
            // Auth::logout();
            return redirect()->route('login')
            ->with('error','Username atau Password Salah.');
        }
          
    }


    
    //  for mobile
    public function loginMobile(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

          // Find the user by email
          $user = DB::table('karyawan')
          ->leftJoin('jabatan','karyawan.jabatan_id','=','jabatan.id')
          ->leftJoin('users','karyawan.users_id','=','users.id')
          ->select('karyawan.id','karyawan.nama','karyawan.nik',
          'karyawan.tgl_lahir as tgl_lahir',
          'users.email as email'
          ,'karyawan.jenis_kelamin as jenis_kelamin','karyawan.telp','jabatan.jabatan as jabatan')
          ->where('users.email','=',$request->get('email'))
          ->first();

          $response = [
            'StatusCode'    => 200,
            'message'   => 'Login Berhasil',
            'token'      => $token,
            'Data' => $user,
        ];   

        return response()->json(['result' =>$response ]);
    }
}
