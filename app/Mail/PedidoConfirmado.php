<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;

class PedidoConfirmado extends Mailable
{
    use Queueable, SerializesModels;

    public $cartItems;
    public $total;
    public $metodoEnvio;
    public $direccion;
    /**
     * Create a new message instance.
     */
    public function __construct($cartItems, $total, $metodoEnvio, $direccion)
    {
        $this->cartItems = $cartItems;
        $this->total = $total;
        $this->metodoEnvio = $metodoEnvio;
         $this->direccion = $direccion;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido Confirmado',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pedido_confirmado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('emails.pedido-confirmado')
                    ->subject('Confirmación de Pedido')
                    ->with([
                        'cartItems' => $this->cartItems,
                        'total' => $this->total,
                        'metodoEnvio' => $this->metodoEnvio,
                         'direccion' => $this->direccion, // Pasar la dirección a la vista

                    ]);
    }
}
