<?php

namespace App\Http\Controllers;

use App\Models\Craiglorious\Todo;
use Illuminate\Http\Request;

use App\Http\Requests;

class TodosController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request,[
            'task' => 'required:string'
        ]);

        $todo = new Todo;
        $todo->task = $request->input('task');
        $todo->completed = $request->input('completed');
        $todo->save();

        return response()->success(compact('todo'));

    }
}
