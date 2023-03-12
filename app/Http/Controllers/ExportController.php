<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class ExportController extends Controller
{
    public function export(Request $request)
    {

        // Get the data to export
       // $data = Task::all();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $tasks = Task::whereBetween('created_at', [$startDate, $endDate])->get();

        $filename = 'test.csv';

        // Set the file path for the CSV file
        $file_path = 'excel_exports/' . $filename;

        // Open the file pointer for writing the CSV data
        $file = fopen(storage_path('app/' . $file_path), 'w');


        // Write the CSV headers to the file
        fputcsv($file, ['Name', 'Task', 'Date']);

        // Write the CSV data to the file
        foreach ($tasks as $task) {
            fputcsv($file, [$task->name, $task->task, $task->created_at]);
        }

        fflush($file);

        // Close the file pointer
        fclose($file);

//        Mail::to('recipient@example.com')
//            ->send(new SignUp($tasks));

        // Store the CSV file in the storage directory
       // Storage::put('C:\Users\ADMIN\Desktop\excelll\tasks.csv', file_get_contents(storage_path('C:\Users\ADMIN\Desktop\excelll\tasks.csv')));

        // Return the file path for later use
        return storage_path('app/' . $file_path);


    }
}
