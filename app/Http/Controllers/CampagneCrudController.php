<?php

namespace App\Http\Controllers;

use App\Models\Campagne;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CampagneRequest;
use Illuminate\Support\Facades\Storage;

class CampagneCrudController extends Controller {

    function create(Campagne $campagne, CampagneRequest $request) {
        $campagne = Campagne::create([
            'nom' => $request->validated['nom'],
            'slug' => uniqid() . '-' . Str::slug($request->validated['nom']),
        ]);

        Storage::disk('emails_campagne')->put($campagne->slug . '.blade.php', '@extends(\'campagne.emails._base\')' . PHP_EOL  . PHP_EOL . '@section(\'body\')' . PHP_EOL . PHP_EOL . '@endsection');

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

    function update(Campagne $campagne, CampagneRequest $request) {
        $campagne->update($request->validated);
        return redirect()->route('campagne.liste');
    }

    function delete(Campagne $campagne) {
        $campagne->delete();
        Storage::disk('emails_campagne')->delete($campagne->slug . '.blade.php');
        return redirect()->route('campagne.liste');
    }
}
