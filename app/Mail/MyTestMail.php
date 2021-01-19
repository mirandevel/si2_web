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
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,Request $request)
    {
        $this->details = $details;
        $this->request=$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmar correo electronico')
            ->view('verif-email',['link'=>route('verification',['id'=>$this->request->user()->id])]);
    }
  /*  public function build()
    {
        return $this->view('view.name');
    }*/
}
