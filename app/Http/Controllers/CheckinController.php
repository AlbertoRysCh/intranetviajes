<?php

namespace App\Http\Controllers;
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
        'etiquetamaleta' => 'required|string',
        'colormaleta' => 'required|string',
        'caracteristicamaleta' => 'nullable|string',
        'pesomaleta' => 'required|numeric',
        'fotomaleta' => 'required|array', // Cambiado a 'array' para múltiples archivos
        'fotomaleta.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validación individual para archivos
        'lugarmaleta' => 'required|string',
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

    // Guardar los demás campos
    $checkin->tip_maleta = $request->maletatype;
    $checkin->num_etiqueta = $request->etiquetamaleta;
    $checkin->color = $request->colormaleta;
    $checkin->caracteristicas = $request->caracteristicamaleta;
    $checkin->peso = $request->pesomaleta;
    $checkin->lugar_regis = $request->lugarmaleta;

    // Guardar el registro
    $checkin->save();

    // Redirigir a una página de éxito o al dashboard
    return redirect()->route('mi-checkin.show')->with('success', 'Datos del check-in guardados correctamente');
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
            'Bolso de mano o mochila',
            'Equipaje de mano (carry on)',
            'Equipaje de Bodega'
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
        //
    }
}
