<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
        // $param = 'Hi Guys';
        // return view('home',['params'=>$param]);
        $list_todo = Todo::latest()->get(); //select * from table 'todos' order by 'created_by'
        $total_task = count(Todo::get());
        $ongoing_list = Todo::where('status', '=', 0)->get();
        $ongoing_count = count($ongoing_list);
        $completed_task = count(Todo::where('status','=',1)->get());
        return view('home', [
            'list_todo' => $list_todo,
            'total_task'=>$total_task,
            'ongoing_count' => $ongoing_count,
            'completed_task'=> $completed_task,

        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('create');
    }

    public function store(TodoRequest $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        // dd($request->all());  //equal to console.log 
        return redirect()->route('home');
    }

    public function update(Request $request, Todo $todo)
    {
        // dd( $request);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->save();

        return redirect()->route('home');
    }

    public function edit(Todo $todo)
    {

        return view('update', ['todo' => $todo]);
    }

    public function delete(Todo $todo)
    {
        $todo->delete();  //delete 
        return redirect()->route('home');
    }
}
