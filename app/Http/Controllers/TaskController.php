<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

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
        return $tasks;
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3|max:255',
            'lat' => 'required',
            'long' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all(),
                'task' => []
            ];
        }

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->lat = $request->lat;
        $task->long = $request->long;

        $task->save();
        return [
            'created' => true,
            'errors'  => [],
            'task' => $task,
        ];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3|max:255',
            'lat' => 'required',
            'long' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all(),
                'task' => []
            ];
        }


        $task = Task::findOrFail($request->id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->condition = $request->condition;
        $task->lat = $request->lat;
        $task->long = $request->long;

        $task->save();

        return [
            'created' => true,
            'errors'  => [],
            'task' => $task,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = Task::destroy($request->id);
        return $task;
    }

    public function updatecheckstatus(Request $request)
    {
        $task = Task::findOrFail($request->id);
        
        if($task->status == 0){
            $task->update([
                'status' => 1
            ]);
        }else{ 
            $task->update([
                'status' => 0
            ]);
        }
        return $task;
    }
}
