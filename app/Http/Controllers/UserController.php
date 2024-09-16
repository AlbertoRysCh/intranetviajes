<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $json = File::get(public_path('countries.json'));
        $countries = json_decode($json)->countries;
        return view('users.mis-datos', compact('user','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        // Leer el archivo JSON
        $json = File::get(public_path('countries.json'));
        $countries = json_decode($json)->countries;

        return view('users.edit', compact('user', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
     
        /*$validated = $request->validate([
            'first-name' => 'required|string|max:255',
            'last-name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telefono' => 'nullable|string|max:15',
            // Agrega otras validaciones según sea necesario
        ]);*/
       /*$user->apellidos = $request->input('apellidos');*/ 
        $user->sexo = $request->input('genero');
        $user->tip_documento = $request->input('tipo_documento');
        $user->documento = $request->input('documento');
        $nacimiento = Carbon::createFromFormat('m/d/Y', $request->input('nacimiento'))->format('Y-m-d');
        /*$user->nacimiento = $nacimiento;*/
	 // Verificar el formato de la fecha de nacimiento
    /*$nacimientoInput = $request->input('nacimiento');
    if ($nacimientoInput && \DateTime::createFromFormat('d/m/Y', $nacimientoInput) !== false) {
        $nacimiento = Carbon::createFromFormat('d/m/Y', $nacimientoInput)->format('Y-m-d');
    } else {
        // Si no se proporciona una fecha válida, usar la fecha actual
        $nacimiento = Carbon::now()->format('Y-m-d');
    }*/
    $user->nacimiento = $nacimiento;
        $user->edad = $request->input('edad');
        $user->direccion = $request->input('direccion');
        $user->telefono = $request->input('celular');
        $user->pais_origen = $request->input('p_origen');
        $user->nombre_emer = $request->input('nombre_emer');
        $user->apellido_emer = $request->input('apellido_emer');
        $user->celular_emer = $request->input('celular_emer');
        $user->hobbies = $request->input('hobbie');
        $user->deportes = $request->input('deporte');
        $user->plato_fav = $request->input('plato_fav');
        $user->color_fav = $request->input('color');
        $user->acti_relacional = $request->input('act_relacional');
        $user->espe_detalles_r = $request->input('esp_detalles_r');
        $user->otr_conductas = $request->input('otr_conductas');
        $user->espe_detalles_c = $request->input('esp_detalles_c');
        $user->informacion_ad = $request->input('informacion_ad');
        $user->noti_email = $request->input('email_r');
        // Agrega otros campos según sea necesario
        //dd($user);
        $user->save();

        //return redirect()->route('users.mis-datos')->with('success', 'Datos actualizados correctamente');
        return response()->json([
            'success' => true,
            'message' => 'Los datos se han cambiado correctamente.'
        ]);
    }
    public function updateFoto(Request $request)
    {
	try {

        $user = Auth::user();

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Eliminar la imagen antigua si existe
            $image = Image::make($request->file('avatar'));

            if ($image->width() == 512 || $image->height() == 512) {
                return response()->json(['success' => false, 'message' => 'La imagen debe tener un tamaño de 512x512 píxeles.']);
            }
            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }

            // Guardar la nueva imagen
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->foto = $avatarPath;
            $user->save();
        }

        return response()->json(['success' => true, 'avatar_url' => asset('storage/' . $user->foto)]);
    }catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
