<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfilMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body; // Propriété $body accessible dans la vue

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->body = 'Contenu du message'; // Initialise le contenu du message
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inscription')
                    ->with('body', $this->body) // Passe $this->body à la vue
                    ->subject('Profile Mail'); // Sujet de l'email
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
