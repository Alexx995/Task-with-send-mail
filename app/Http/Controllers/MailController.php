<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUp;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class MailController extends Controller
{
    public function sendMail()
    {

        Mail::to('fake@mail.com')->send(new SignUp());

        return view('dashboard');

    }

    public function downloadFile()
    {
        $path = storage_path('app/excel_exports/test.csv');
        $fileName = 'test.csv';

        return Response::download($path, $fileName, ['Content-Type: application/zip']);
//        dd('test');
       // return Storage::download('excel_exports/test.csv');
    }
}
