<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Task;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.show_tasks')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.add_task');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'taskTitle' => 'required|min:5|max:255',
            'taskDescription' => 'max:1000'
        ]);

        $newTask = new Task;
        $newTask->task_title = $validateData['taskTitle'];
        $newTask->task_description = $validateData['taskDescription'];

        // dd($newTask);
        if ( $newTask->save() ) :
            return redirect()->route('show_tasks')->with('success', 'Task added successfuly.');
        else :
            return redirect()->back()->with('error', 'Sorry, something went wrong :( - please try again.');
        endif;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findTask = Task::findOrFail($id);

        return view('tasks.show_single_task')->withTask($findTask);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findTask = Task::findOrFail($id);
        return view('tasks.edit_task')->withTask($findTask);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findTask = Task::findOrFail($id);

        $findTask->task_title = $request->taskTitle;
        $findTask->task_description = $request->taskDescription;

        if ( $findTask->save() ):
            return redirect()->route('show_single_task', $findTask->id)->withSuccess('The task was successfuly updated.');
        else:
            return redirect()->back()->withError('Something went wrong, the task was not updated.');
        endif;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findTask = Task::findOrFail($id);

        if ($findTask):
            $findTask->delete();
            return redirect()->route('show_tasks')->with('success', 'Task deleted successfuly.');
        else:
            return redirect()->back();
        endif;
    }
}
