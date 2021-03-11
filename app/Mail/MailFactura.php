<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailFactura extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $factura;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$factura)
    {
        $this->details = $details;
        $this->factura = $factura;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Factura')
            ->view('factura',['detalles'=>$this->details,'factura'=>$this->factura]);
    }
}
