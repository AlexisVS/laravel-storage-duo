<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembreController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "img" => "required",
            "name" => "required",
            "age" => "required",
            "gender" => "required",
        ]);

        Storage::put('public/img', $request->file('img'));
        $membre = new Membre();
        $membre->img = $request->file('img')->hashName();
        $membre->name = $request->name;
        $membre->age = $request->age;
        $membre->gender = $request->gender;
        $membre->save();
        return redirect("/")->with('success', "membre crée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Membre $membre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function edit(Membre $membre)
    {
        $genders = Genre::all();
        return view('pages.membre.edit', compact('membre', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membre $membre)
    {
        $request->validate([
            "img" => "required",
            "name" => "required",
            "age" => "required",
            "gender" => "required",
        ]);

        Storage::delete('public/img/' . $membre->img);
        Storage::put('public/img', $request->file('img'));

        $membre->img = $request->file('img')->hashName();
        $membre->name = $request->name;
        $membre->age = $request->age;
        $membre->gender = $request->gender;
        $membre->save();
        return redirect("/")->with('success', "Le membre " . $membre->name . "a été mis a jour.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membre $membre)
    {
        Storage::delete('public/img/' . $membre->img);
        return redirect("/")->with('warning', "Membre " . $membre->name . " supprimer");
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function download(Membre $membre)
    {
        return Storage::download("public/img/". $membre->img);
    }
}
