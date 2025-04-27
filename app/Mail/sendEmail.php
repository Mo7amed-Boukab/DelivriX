<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $email;
    public $password;
    public $commande_number;
    public $product;
    public $quantite;
    public $total;
    public $is_new_account;

    public function __construct($username, $email, $password, $commande_number, $product, $quantite, $total, $is_new_account = true)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->commande_number = $commande_number;
        $this->product = $product;
        $this->quantite = $quantite;
        $this->total = $total;
        $this->is_new_account = $is_new_account;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'DelivriX - Confirmation de votre commande',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.clientMailMessage',
            with: [
               'username' => $this->username, 
               'email' => $this->email, 
               'password' => $this->password,
               'commande_number' => $this->commande_number,
               'product' => $this->product,
               'quantite' => $this->quantite,
               'total' => $this->total,
               'is_new_account' => $this->is_new_account
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
