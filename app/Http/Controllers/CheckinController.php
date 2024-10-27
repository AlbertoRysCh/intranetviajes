<?php

namespace App\Http\Controllers;
use App\Mail\LuggageSavedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Checkin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    // Validación de los datos
    $request->validate([
        'maletatype' => 'required|string',
        'colormaleta' => 'required|string',
        'caracteristicamaleta' => 'nullable|string',
        'pesomaleta' => 'required|numeric',
        'fotomaleta' => 'required|array', // Cambiado a 'array' para múltiples archivos
        'fotomaleta.*' => 'image|mimes:jpeg,png,jpg', // Validación individual para archivos
	'fotomaleta1' => 'nullable|array', // Validación para la imagen frontal
        'fotomaleta1.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        'fotomaleta2' => 'nullable|array', // Cambiado a array
        'fotomaleta2.*' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);
    // Crear un nuevo registro de Checkin
    $checkin = new Checkin();
    $checkin->userID = Auth::id();

    // Cargar y guardar las imágenes
    if ($request->hasFile('fotomaleta')) {
        $imageNames = [];
        foreach ($request->file('fotomaleta') as $file) {
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/checkins'), $imageName);
            $imageNames[] = $imageName;
        }
        $checkin->images = json_encode($imageNames); // Guardar los nombres de las imágenes en formato JSON
    }

    // Guardar las imágenes de 'fotomaleta1'
    if ($request->hasFile('fotomaleta1')) {
        $imageNames1 = [];
        foreach ($request->file('fotomaleta1') as $file) {
            $imageName1 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/checkins'), $imageName1);
            $imageNames1[] = $imageName1;
        }
        $checkin->images1 = json_encode($imageNames1); // Guardar las imágenes de 'fotomaleta1'
    }

    // Guardar las imágenes de 'fotomaleta2'
    if ($request->hasFile('fotomaleta2')) {
        $imageNames2 = [];
        foreach ($request->file('fotomaleta2') as $file) {
            $imageName2 = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/checkins'), $imageName2);
            $imageNames2[] = $imageName2;
        }
        $checkin->images2 = json_encode($imageNames2); // Guardar las imágenes de 'fotomaleta2'
    }

    // Guardar los demás campos
    $checkin->tip_maleta = $request->maletatype;
    $checkin->color = $request->colormaleta;
    $checkin->caracteristicas = $request->caracteristicamaleta;
    $checkin->peso = $request->pesomaleta;

    // Guardar el registro
    $checkin->save();

    // Enviar el correo electrónico al usuario
    $luggageDetails = [
        'maletatype' => $request->maletatype,
        'colormaleta' => $request->colormaleta,
        'pesomaleta' => $request->pesomaleta,
    ];

    Mail::to(Auth::user()->email)->send(new LuggageSavedMail(Auth::user(), $luggageDetails));

    // Redirigir a una página de éxito o al dashboard
    return redirect()->route('mi-checkin.show')->with('success', '¡Equipaje guardado exitosamente!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::id();
        $checkin = Checkin::where('userID', Auth::id())->get();
        $registeredTypes = Checkin::where('userID', $user_id)
                                ->pluck('tip_maleta')
                                ->toArray(); 
        // Todas las opciones posibles de maleta
        $allTypes = [
            'Maleta de 8kg',
            'Maleta de 23kg'
        ];
       
            //dd($checkin);
        return view('users.mi-checkin', compact('checkin','registeredTypes','allTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkin = Checkin::find($id);
    return view('checkin.edit', compact('checkin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkin = Checkin::findOrFail($id);
    
    // Elimina el registro
    $checkin->delete();

    // Redirige con un mensaje de éxito
    return redirect()->back()->with('success', 'El equipaje ha sido eliminado exitosamente.');
    }
}
