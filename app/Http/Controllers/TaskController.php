<?php

namespace App\Http\Controllers;

use App\Events\ToDoCompletedEvent;
use App\Events\ToDoCreatedEvent;
use App\Events\ToDoDeletedEvent;
use App\Events\ToDoEditEvent;
use App\Models\ToDoTask;
use App\Models\UserLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.addTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ToDoTask();
        $data->taskName = $request->input('taskName');
        $data->ownerID = Auth::id();
        if ($request->input('taskDeadline')!=null){
            $data->deadlineTask = $request->input('taskDeadline');
        }
        if ($request->input('completedTask')!=null){
            $data->completedTask = $request->input('completedTask');
        }

        event(new ToDoCreatedEvent($data));
        $data->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #Controller
    public function arrangeTask($id)
    {
        $task = ToDoTask::find($id);
        if ($task->completedTask == false){
            $task->completedTask = true;
            event(new ToDoCompletedEvent($task));
        }
        else{
            $task->completedTask = false;
            event(new ToDoEditEvent($task));
        }
        $task->save();
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $task = ToDoTask::find($id);
        return view('home.editTask',['task'=>$task]);
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
        $task = ToDoTask::find($id);
        $task->taskName = $request->input('taskName');
        if ($request->input('taskDeadline')!=null){
            $task->deadlineTask = $request->input('taskDeadline');
        }
        event(new ToDoEditEvent($task));
        $task->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = ToDoTask::find($id);
        event(new ToDoDeletedEvent($task));
        DB::table('to_do_tasks')->where('id','=',$id)->delete();
        return redirect()->route('home');
    }

    public function deleteDeadline($id){
    $task = ToDoTask::find($id);
    $task->taskDeadline = null;
    event(new ToDoEditEvent($task));
    $task->save();
    return view('home.editTask');
    }
}
