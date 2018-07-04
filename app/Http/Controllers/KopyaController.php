<?php

namespace App\Http\Controllers;

use App\Kopya;
use Illuminate\Http\Request;

class KopyaController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('kopya.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:kopyas|min:3',
            'body' => 'required|min:10',
        ]);

        $kopya = new Kopya($validatedData);
        $kopya->user_id = $request->user()->id;
        $kopya->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kopya  $kopya
     * @return \Illuminate\Http\Response
     */
    public function show(Kopya $kopya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kopya  $kopya
     * @return \Illuminate\Http\Response
     */
    public function edit(Kopya $kopya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kopya  $kopya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kopya $kopya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kopya  $kopya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kopya $kopya)
    {
        //
    }
}
