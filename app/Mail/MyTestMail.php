<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$id)
    {
        $this->details = $details;
        $this->id=$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmar correo electronico')
            ->view('verif-email',['link'=>route('verification',['id'=>$this->id])]);
    }
  /*  public function build()
    {
        return $this->view('view.name');
    }*/
}
