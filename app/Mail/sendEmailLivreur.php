<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendEmailLivreur extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $email;
    public $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'DelivriX - vos information de connexion',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.livreurMailMessage',
            with: [
               'username' => $this->username, 
               'email' => $this->email, 
               'password' => $this->password,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
