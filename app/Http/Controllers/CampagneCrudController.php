<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use Illuminate\Http\Request;
use App\Http\Requests\CampagneRequest;

class CampagneCrudController extends Controller {

    function create(Campagne $campagne, Request $request) {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:campagne,slug'
        ]);

        Campagne::insert($validated);
        return redirect()->route('campagne.liste');
    }

    function read(Campagne $campagne = null) {
        if (empty($campagne)) return view('campagne.liste', ['campagnes' => Campagne::with('souscriptions')->get()]);

        $campagne->load('souscriptions');
        return view('campagne.details', compact('campagne'));
    }

    function form(Campagne $campagne = null) {
        return view('campagne.form', [
            'campagne' => $campagne,
            'isUpdate' => !empty($campagne)
        ]);
    }

    function update(Campagne $campagne, Request $request) {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:campagne,slug,' . $campagne->id
        ]);

        $campagne->update($validated);
        return redirect()->route('campagne.liste');
    }

    function delete(Campagne $campagne) {
        $campagne->delete();
        return redirect()->route('campagne.liste');
    }
}
