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
    // Verificar si ya existe un check-in para el usuario actual
    $checkin = Checkin::where('userID', Auth::id())->first();

    if ($checkin) {
        // Si ya existe, actualizar el registro existente
        $checkin->update([
            'tip_documento' => $request->input('documentoci'),
            'num_documento' => $request->input('numero-document-ci'),
            'fecha_emi' => date('Y-m-d', strtotime($request->input('fecha-emision'))),
            'fecha_venc' => date('Y-m-d', strtotime($request->input('fecha-vencimiento'))),
            'descrip_8kg' => $request->input('descrip_equi_8kg'),
            'descrip_23kg' => $request->input('descrip_equi_23kg'),
        ]);
    } else {
        // Si no existe, crear un nuevo registro
        $checkin = Checkin::create([
            'travelID' => $request->input('travelID', 1),
            'tip_documento' => $request->input('documentoci'),
            'num_documento' => $request->input('numero-document-ci'),
            'fecha_emi' => date('Y-m-d', strtotime($request->input('fecha-emision'))),
            'fecha_venc' => date('Y-m-d', strtotime($request->input('fecha-vencimiento'))),
            'userID' => Auth::id(),
            'descrip_8kg' => $request->input('descrip_equi_8kg'),
            'descrip_23kg' => $request->input('descrip_equi_23kg'),
        ]);
    }

    // Manejo de archivos subidos
    if ($request->hasFile('image_documento')) {
        $imageName = time() . '.' . $request->file('image_documento')->extension();
        $request->file('image_documento')->move(public_path('images'), $imageName);
        $checkin->update(['image_documento' => $imageName]);
    }

    if ($request->hasFile('pass_boarding_file')) {
        $passBoardingName = time() . '.' . $request->file('pass_boarding_file')->extension();
        $request->file('pass_boarding_file')->move(public_path('images'), $passBoardingName);
        $checkin->update(['pass_board' => $passBoardingName]);
    }
    if ($request->hasFile('luggage_file')) {
        $luggageName = time() . '.' . $request->file('luggage_file')->extension();
        $request->file('luggage_file')->move(public_path('images'), $luggageName);
        $checkin->update(['equipaje_8kg' => $luggageName]);
    }
    if ($request->hasFile('equipa_23_file')) {
        $luggage23kgName = time() . '.' . $request->file('equipa_23_file')->extension();
        $request->file('equipa_23_file')->move(public_path('images'), $luggage23kgName);
        $checkin->update(['equipaje_23kg' => $luggage23kgName]);
    }

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
        $checkin = Checkin::where('userID', Auth::id())->first(); 
        //dd($checkin);
        return view('users.mi-checkin', compact('checkin'));
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
