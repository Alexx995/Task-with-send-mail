<?php

namespace App\Http\Controllers;

use App\Events\NewTaskAdded;
use App\Jobs\SendTaskCreatedEmail;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();


        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'task' => 'required',
            'image' => 'nullable|image',
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->task = $request->task;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data = file_get_contents($image->getRealPath());
            $task->image = $data;
        }

        $task->save();

        //event(new NewTaskAdded(auth()->user(),$task));

        //dispatch(new SendTaskCreatedEmail(auth()->user(), $task));

        dispatch(new SendTaskCreatedEmail($task, auth()->user()))->delay(now()->addSeconds(3));

       // $task->save();


        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'task' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data = file_get_contents($image->getRealPath());
            $task->image = $data;
        }

        $task->update($validatedData);

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect(route('tasks.index'));
    }

    public function showBetweenDates(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $tasks = Task::whereBetween('created_at', [$startDate, $endDate])->get();

        if ($tasks->isEmpty()) {
            $message = 'No tasks were created between the selected dates.';
            return view('tasks.statements', ['message' => $message]);
        }


        return view('tasks.statements', ['tasks' => $tasks]);
    }

    public function exportUser()
    {
        dd('dedededede');
    }


}
