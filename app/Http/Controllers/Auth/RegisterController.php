<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            \Log::info('Registration Form Data: ' . json_encode($request->all()));
    
            $data = $request->all();
            return $this->create($data);
        } catch (\Exception $e) {
            \Log::error('Registration Error: ' . $e->getMessage());
        }
    }
    


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:patient,doctor'],
        ]);
    }

    protected function create(array $data)
{
    try {
        \Log::info('Registration Attempt: ' . json_encode($data));

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        $user->save();

        \Log::info('User Created: ' . $user->toJson());

        if ($data['role'] === 'patient') {
            Patient::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
            ]);
            return redirect()->route('patients.index');
        } elseif ($data['role'] === 'doctor') {
            Doctor::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'dob' => $data['dob'],
            ]);
            return redirect()->route('doctors.index');

        }

        return redirect('/dashboard');

    } catch (\Exception $e) {
        \Log::error('Registration Error: ' . $e->getMessage());
    }
}



}
