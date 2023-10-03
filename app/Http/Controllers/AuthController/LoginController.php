<?php
namespace App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log; 

class LoginController extends Controller
{
    function index () {
         
        return view('auth.login');
    }




function loginWithGoogle() {
    try {
        return Socialite::driver('google')->redirect();
    
    } catch (\Exception $e) {
        return redirect()->route('error');
    }
}
function handleGoogleCallback() {
    try {
        $googleUser = Socialite::driver('google')->user();
        $existingUser = User::where('email', $googleUser->email)->first();

        if ($existingUser) {
            
            auth()->login($existingUser);

        } else {
            
            $newUser = new User();
            $newUser->name = $googleUser->name;
            $newUser->email = $googleUser->email;
            $newUser->password = Hash::make($googleUser->name.'@'.$googleUser->getId());
            $newUser->google_id = $googleUser->getId();
            $newUser->save();

            auth()->login($newUser);
        }

        return redirect()->route('dashboard');

    } catch (\Throwable $th) {
        throw $th;
        Log::error('An error occurred: ' . $th->getMessage());
        $errorMessage = 'An error occurred. Please try again later or contact support.';

        return view('error', compact('errorMessage'));
    }
    
}


public function error()
{
    $errorMessage = "An error occurred"; 
    return view('error', compact('errorMessage'));
}


    function login (Request $request) { 
        
            $request->validate([
                'email'      => 'required',
                'password'     => 'required',
            ]);
            
            if(\Auth::attempt($request->only('email','password'))) {
                 return redirect('dashboard');
            }

            return redirect('login')->withError('Login details are not valid');
         
    }

    function register(){
        
        return view('auth.register');
    }

    function forgot(){
        
        return view('auth.forgot');
    }

    function forgot_pass(){
        
        return view('auth.forgot');
    }

    function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }

    function register_user(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    
        
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
         Auth::login($user);
    
        return redirect('dashboard');
    }
}
