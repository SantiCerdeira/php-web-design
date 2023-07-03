<?php

namespace App\Mail;

use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServicioReservado extends Mailable
{
    use Queueable, SerializesModels;

    public Servicio $servicio;
    public Usuario $usuario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Servicio $servicio, Usuario $usuario)
    {
        $this->servicio = $servicio;
        $this->usuario = $usuario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-responder@webexpert.com', 'WebExpert')
            ->view('mail.servicioReservado');
    }
}
