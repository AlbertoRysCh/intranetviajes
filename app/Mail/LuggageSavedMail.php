<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LuggageSavedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $luggageDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $luggageDetails)
    {
        $this->user = $user;
        $this->luggageDetails = $luggageDetails;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Equipaje Registrado',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    /*public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }*/
    public function build()
    {
        return $this->subject('Confirmación de Equipaje Guardado')
                    ->view('emails.luggage_saved');
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}