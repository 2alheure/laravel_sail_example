<?php

namespace App\Console\Commands;

use App\Models\Souscription;
use Illuminate\Console\Command;

class InsertManyEmails extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-many-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() {
        $toInsert = [];

        for ($i = 0; $i < 100; $i++) {
            $toInsert[] = [
                'email' => 'toto' . $i . '@yopmail.fr',
                'token' => 'a',
                'campagne_id' => 1
            ];
        }

        Souscription::insert($toInsert);
    }
}
