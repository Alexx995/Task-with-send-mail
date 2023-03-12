<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\ExportController;

class SignUp extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
//    public function build()
//    {
//        return $this->view('signUpView')
//            ->subject('Your email subject')
//
//            ->attach(('C:\Users\ADMIN\Desktop\rere.jpg'), [
//                'as' => 'attachment_name.jpg',
//                'mime' => 'image/jpeg',
//            ]);
//    }

//    public function build()
//    {
//        return $this->view('signUpView')
//            ->with([
//                'Path' => 'C:\Users\ADMIN\oop\excelovanje\tasks.csv',
//            ]);
//    }

    public function build()
    {
        $downloadLink = route('downloadFile');

        return $this->view('signUpView')
            ->with('downloadLink', $downloadLink);
    }
}
