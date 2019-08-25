<?php

namespace App\Http\Controllers;

use App\Task;
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
      return view('task.index',compact('tasks',$tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate
      $request->validate([
          'title' => 'required|min:3',
          'description' => 'required',
      ]);
      $task = Task::create(['title' => $request->title,'description' => $request->description]);
      return redirect('/show-task/'.$task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('id',$id)->first();
        return view('task.show',compact('task',$task));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $task = Task::where('id',$id)->first();
        return view('task.edit',compact('task',$task));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // Validate
      $request->validate([
          'title' => 'required|min:3',
          'description' => 'required',
      ]);

      $task = Task::where('id',$id)->update(['title' => $request->title,'description' => $request->description]);
      return redirect('/show-task/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request  $request)
    {
      $task = Task::where('id',$id)->first();
      $task->delete();
      $request->session()->flash('message', 'Successfully deleted the task!');
      return redirect('tasks');
    }
}
