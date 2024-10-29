<?php

namespace App\Http\Controllers;

use App\Models\CreatePayments;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateGroups;
use App\Models\Travel;
use Illuminate\Http\Request;

class CreatePaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // Obtener todos los grupos a los que pertenece el usuario con sus respectivos viajes
        $groups = $user->groups()->with('travel')->get();

        return view('users.mis-pagos', compact('groups'));
    }

    public function showTravelStatus($groupId)
{
    // Obtener el grupo con el viaje relacionado usando el ID del grupo
    $group = CreateGroups::with('travel')->find($groupId);

    if ($group && $group->travel) {
        $travel = $group->travel;
        return view('users.mi-estado', compact('travel', 'group'));
    } else {
        return redirect()->route('dashboard')->with('error', 'Viaje no encontrado.');
    }
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
     * @param  \App\Models\CreatePayments  $createPayments
     * @return \Illuminate\Http\Response
     */
    public function show(CreatePayments $createPayments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreatePayments  $createPayments
     * @return \Illuminate\Http\Response
     */
    public function edit(CreatePayments $createPayments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreatePayments  $createPayments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreatePayments $createPayments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreatePayments  $createPayments
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreatePayments $createPayments)
    {
        //
    }
}
