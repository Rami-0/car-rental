<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'], // Add last_name validation
            'license_id_number' => ['required', 'string', 'max:255'], // Add license_id_number validation
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'personal_photo' => ['', 'image', 'max:2048'], // Add personal_photo validation
        ]);

        //Store the personal photo and get the file path
        $personalPhotoPath = $this->storePersonalPhoto($request->file('personal_photo'));


        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name, // Add last_name field
            'license_id_number' => $request->license_id_number, // Add license_id_number field
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "user",
            'personal_photo' => $personalPhotoPath, // Store the file path
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    protected function storePersonalPhoto($photo)
    {
        // Customize this method to store the personal photo and return the file path.
        // Example:
        if(!$photo) {
            return null;
        }
        $path = $photo->store('personal-photos', 'public');
        return $path;
    }

}
