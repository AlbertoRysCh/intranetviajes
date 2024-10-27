<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthSheet;
use Illuminate\Support\Facades\Auth;
use App\Mail\CamposCompletadosMailFichaM;
use Illuminate\Support\Facades\Mail;
class health_sheetController extends Controller
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
    public function enviarCorreoF(Request $request)
    {
    // Obtén el correo del usuario autenticado
    $usuario = Auth::user();
    $email = $usuario->email;

    // Obtén el mensaje del request
    $mensaje = $request->input('mensaje', 'Has completado el 100% de tus datos.');

    // Envía el correo
    Mail::to($email)->send(new CamposCompletadosMailFichaM($mensaje));
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
        // Validar los datos de la solicitud
        $request->validate([
            'g_sanguineo' => 'required|string',
            'factor_rh' => 'required|string',
            'hist_medic' => 'nullable|file|mimes:pdf|max:2048',
            'hist_salud_em' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Manejar la carga de archivos
        $histMedicPath = null;
        $histSaludEmPath = null;

        // Historial Médico
        if ($request->hasFile('hist_medic')) {
            $histMedicPath = $request->file('hist_medic')->store('health_sheets', 'public');
        } else {
            // Mantener el valor existente si no se carga un nuevo archivo
            $existingHealthSheet = HealthSheet::where('userID', Auth::id())->first();
            if ($existingHealthSheet) {
                $histMedicPath = $existingHealthSheet->hist_medico;
            }
        }

          // Historial de Salud Emocional
        if ($request->hasFile('hist_salud_em')) {
            $histSaludEmPath = $request->file('hist_salud_em')->store('health_sheets', 'public');
        } else {
            // Mantener el valor existente si no se carga un nuevo archivo
            $existingHealthSheet = $existingHealthSheet ?? HealthSheet::where('userID', Auth::id())->first();
            if ($existingHealthSheet) {
                $histSaludEmPath = $existingHealthSheet->hist_med_em;
            }
        }

        $inmunizaciones = implode(',', $request->input('inmunizacion', []));
        // Crear o actualizar la ficha médica del usuario logueado
        $healthSheet = HealthSheet::updateOrCreate(
            ['userID' => Auth::id()],
            [ 
                'grupo_sanguineo' => $request->input('g_sanguineo'),
                'factor_rh' => $request->input('factor_rh'),
                'tratamiento' => $request->input('tratamiento'),
                'tratamiento_obs' => $request->input('obs_tratamiento'),
                'tratamiento_rec' => $request->input('rec_tratamiento'),
                'tratamiento_med' => $request->input('nom_tratamiento'),
                'tratamiento_sum' => $request->input('sum_tratamiento'),
                'tratamiento_dosis' => $request->input('dosi_tratamiento'),
                'enfermedad' => $request->input('enfermedad'),
                'enfermedad_obs' => $request->input('obs_enfermedad'),
                'enfermedad_rec' => $request->input('rec_enfermedad'),
                'enfermedad_med' => $request->input('nom_enfermedad'),
                'enfermedad_sum' => $request->input('sum_enfermedad'),
                'enfermedad_dosis' => $request->input('dosi_enfermedad'),
                'alergia' => $request->input('medicamento'),
                'alergia_obs' => $request->input('obs_alergico'),
                'alergia_rec' => $request->input('rec_alergico'),
                'alergia_med' => $request->input('nom_alergico'),
                'alergia_sum' => $request->input('sum_alergico'),
                'alergia_dosis' => $request->input('dosi_alergico'),
                'alergia_ad' => $request->input('alergia'),
                'alergia_ad_obs' => $request->input('obs_alerg_ad'),
                'alergia_ad_rec' => $request->input('rec_alerg_ad'),
                'alergia_ad_med' => $request->input('nom_alerg_ad'),
                'alergia_ad_sum' => $request->input('sum_alerg_ad'),
                'alergia_ad_dosis' => $request->input('dosi_alerg_ad'),
                'inmunizacion' => $inmunizaciones,
                'vacunas_adicionales' => $request->input('vac_adicionales'),
                'vacunas_covid' => $request->input('vacunas_covid'),
                'efecto_secundarios' => $request->input('efec_secund'),
                'informacion_adicional_salud' => $request->input('info_ad'),
                'tarjeta_seguro_medico' => $request->input('tar_seguro'),
                'tarjeta_seguro_privado' => $request->input('tar_seguro_priv'),
                'hist_medico' => $histMedicPath,
                'hist_med_em' => $histSaludEmPath,

            ]
        );
        return redirect()->route('ficha-medica.show')->with('success', 'Información médica guardada con éxito.');
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
        //$healthSheets = HealthSheet::all();
        $healthSheet = HealthSheet::where('userID', $user->id)->first();

        // Convertir el campo inmunizacion de cadena a array
    if ($healthSheet) {
        $healthSheet->inmunizacion = explode(',', $healthSheet->inmunizacion);
    }

        return view('users.ficha-medica', compact('healthSheet'));
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
