<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ApiController extends Controller
{
    public function list_todo()
    {
        $list_todo =Todo::latest()->get();
        $result = [];
        foreach($list_todo as $todo)
        {
            
            array_push($result,[
                'id'=>$todo->id,
                'title'=>$todo->title,
                'description'=>$todo->description,
                'status'=>$todo->status == 1 ? 'Completed':'In Progress',
                'date'=>date('d M Y',strtotime($todo->created_at)),
            ]);
        }

        return $result;

    }
}
