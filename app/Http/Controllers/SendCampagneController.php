<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\CampagneMail;
use App\Models\Campagne;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use LogicException;

class SendCampagneController extends Controller {
    function send(Campagne $campagne) {
        if (!Storage::disk('emails_campagne')->exists($campagne->slug . '.blade.php')) {
            throw new LogicException('La vue (' . $campagne->slug . '.blade.php) de la campagne n\'existe pas.');
        }
        foreach ($campagne->souscriptions as $s) {
            SendEmail::dispatchAfterResponse(new CampagneMail($campagne, $s), $s);
        }

        return redirect()->route('campagne.liste');
    }
}
