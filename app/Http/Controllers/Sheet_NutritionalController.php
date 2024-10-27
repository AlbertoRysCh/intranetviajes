<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SheetNutritional;
use App\Mail\CamposCompletadosMailFichaN;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class Sheet_NutritionalController extends Controller
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
    public function enviarCorreoN(Request $request)
    {
    // Obtén el correo del usuario autenticado
    $usuario = Auth::user();
    $email = $usuario->email;

    // Obtén el mensaje del request
    $mensaje = $request->input('mensaje', 'Has completado el 100% de tus datos.');

    // Envía el correo
    Mail::to($email)->send(new CamposCompletadosMailFichaN($mensaje));
    //dd('Correo enviado');
    return response()->json(['success' => true]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        $user = Auth::user();
        SheetNutritional::updateOrCreate(
            ['userID' => $user->id],
            [
                'peso' => $request->input('peso'),
                'talla' => $request->input('talla'),
                'actividad' => $request->input('act_fisica'),
                'alimentacion' => $request->input('tiposAlimentacion'),
                'detalle_alimentacion' => $request->input('edtiposAlimentacion'),
                'alergias' => $request->input('alergiasAlimentarias'),
                'detalles_alergias' => $request->input('edalergiasAlimentarias'),
                'no_consume' => $request->input('noConsume'),
                'detalles_consume' => $request->input('ednoConsume'),
                'habitos' => $request->input('habitosAlimentarios'),
                'detalles_habitos' => $request->input('edhabitosAlimentarios'),
                'pref_comida' => $request->input('preferenciaComida'),
                'detalles_pref_comida' => $request->input('edpreferenciaComida'),
                'tipo_dieta' => $request->input('siguesDieta'),
                'detalles_dieta' => $request->input('edsiguesDieta'),
                // Agrega los demás campos necesarios
            ]
        );
    
        return redirect()->route('nutritional-sheet.show')->with('success', 'Ficha nutricional guardada con éxito.');
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
        $nutritionalSheet = SheetNutritional::where('userID', $user->id)->first();

        // Pasar los datos a la vista
        return view('users.ficha-nutricional', compact('nutritionalSheet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
