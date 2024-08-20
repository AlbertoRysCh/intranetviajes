<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateGroups;
use Illuminate\Support\Facades\Storage;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // Obtener todos los grupos a los que pertenece el usuario
        $groups = $user->groups()->with('travel')->get();

        return view('dashboard', compact('groups'));
    }

    public function showTripDetails($groupId)
    {
        $group = CreateGroups::with('travel')->find($groupId);

        if ($group) {
            $viaje = $group->travel;
            $viaje->groupID = $groupId; // Asegúrate de que el groupID esté disponible

            return view('users.tu-viaje', compact('viaje','group'));
        } else {
            return redirect()->route('dashboard')->with('error', 'Viaje no encontrado.');
        }
    }

    public function downloadItinerario($groupId)
    {
        return $this->downloadFile($groupId, 'itinerario');
    }
    public function downloadIndicaciones($groupId)
    {
        return $this->downloadFile($groupId, 'indicaciones');
    }
    public function downloadRecomendaciones($groupId)
    {
        return $this->downloadFile($groupId, 'recomendaciones');
    }
    public function downloadRopaViaje($groupId)
    {
        return $this->downloadFile($groupId, 'ropa_viaje');
    }
    public function downloadPermisoNotarial($groupId)
    {
        return $this->downloadFile($groupId, 'permiso_notarial');
    }
    public function downloadVoucher($groupId)
    {
        return $this->downloadFile($groupId, 'voucher');
    }
    public function downloadListaClinicas($groupId)
    {
        return $this->downloadFile($groupId, 'lista_clinicas');
    }

    public function downloadFile($groupId, $columnName)
    {
        $group = CreateGroups::with('travel')->find($groupId);

    if ($group && $group->travel && $group->travel->$columnName) {
        $filePath = 'pdfs/' . $group->travel->$columnName;

        if (file_exists(public_path($filePath))) {
            return response()->download(public_path($filePath), $group->travel->$columnName, [
                'Content-Type' => 'application/pdf',
            ]);
        } else {
            return redirect()->back()->with('error', ucfirst($columnName) . ' no encontrado.');
        }
    }

    return redirect()->route('dashboard')->with('error', 'Viaje no encontrado.');
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
    public function show($id)
    {
        //
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
