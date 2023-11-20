<?php

namespace App\Http\Controllers;

use App\Http\Requests\SouscriptionRequest;
use App\Models\Campagne;
use App\Models\Souscription;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SouscriptionController extends Controller {
    function subscriptionForm(Campagne $campagne) {
        return view('souscription.form', compact('campagne'));
    }

    function subscribe(Campagne $campagne, SouscriptionRequest $request) {
        $s = Souscription::where('campagne_id', $campagne->id)
            ->where('email', $request->input('email'))
            ->get();

        if ($s->count() > 0) {
            throw new BadRequestHttpException;
        }

        Souscription::insert([
            'email' => $request->input('email'),
            'token' => hash('sha256', random_bytes(32)),
            'campagne_id' => $campagne->id
        ]);

        return redirect()->back();
    }

    function unsubscribe(Campagne $campagne, string $token) {
        Souscription::where('campagne_id', $campagne->id)
            ->where('token', $token)
            ->delete();

        return redirect()->back();
    }
}
