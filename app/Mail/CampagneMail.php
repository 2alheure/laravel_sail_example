<?php

namespace App\Mail;

use App\Models\Campagne;
use App\Models\Souscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CampagneMail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Campagne $campagne, protected Souscription $souscription) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: $this->campagne->nom,
            from: env('MAIL_FROM_ADDRESS')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'campagne.emails.' . $this->campagne->slug,
            with: [
                'user_email' => $this->souscription->email,
                'unsubscribe_token' => $this->souscription->token,
                'campagne' => $this->campagne
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }
}
