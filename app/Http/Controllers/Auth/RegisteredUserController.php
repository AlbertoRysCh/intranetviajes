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
use Illuminate\Support\Facades\DB;

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
            'apellidos' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', 'string', 'max:255'],
            'documento' => [
                'required', 
                'string', 
                'max:15',
                function ($attribute, $value, $fail) {
                    $count = DB::table('users')->where('documento', $value)->count();
                    if ($count >= 1) {
                        $fail("El $attribute ya existe más de una vez en el sistema.");
                    }
                }
            ],
            //'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],  // Agrega la validación para 'username'
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,

            'tip_documento' => $request->tipo_documento,
            'documento' => $request->documento,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'politica' => $request->has('check-politica-proteccion') ? 'si' : 'no',
            'terminos' => $request->has('check-terminos-condiciones') ? 'si' : 'no',
            'promociones' => $request->has('check-promociones') ? 'si' : 'no',
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
