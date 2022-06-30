<?php

namespace App\Http\Controllers;

use App\Models\Propiedades;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class PropiedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedades::all();

        return view('home', compact('propiedades'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\Propiedades  $propiedades
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedades $propiedades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedades  $propiedades
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedades $propiedades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedades  $propiedades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedades $propiedades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedades  $propiedades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedades $propiedades)
    {
        //
    }
}
