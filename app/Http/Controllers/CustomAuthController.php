<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use Mail;
use App\Models\User;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewCompte;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);
           
        $user = new User();
        $user->setAttribute('name', $request->name);
        $user->setAttribute('email', $request->email);
        $user->setAttribute('password', Hash::make($request->password));
        $user->save();
        
        
        
        $contenu = [
            'name' => $request->name,
            'email' => $request->email ,
            'mot_de_passe' => $request->password,
            'subject'=> 'Custom - CREATION DE COMPTE'
        ];
        $email = $request->email;

        # code...
        Mail::to($email)->queue(new NewCompte($contenu));
        Alert::success('Succès', 'Enregistrement reussi');

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
      ]);
      
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}