<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormAltaProductorFakerRequest;
use App\Http\Requests\UpdateFormAltaProductorFakerRequest;
use App\Models\FormAltaProductorFaker;
use Inertia\Inertia;

class FormAltaProductorFakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Inertia::render('Fakers/FormularioALtaProductor/index', [
            'number' => 1,
        ]);
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
     * @param  \App\Http\Requests\StoreFormAltaProductorFakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormAltaProductorFakerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function show(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function edit(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormAltaProductorFakerRequest  $request
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormAltaProductorFakerRequest $request, FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }
}
