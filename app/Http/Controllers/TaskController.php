<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $id = request()->user()->id;
        $api_data = Task::where("user_id",$id)->get();
        return view('task.alltasks',compact('api_data'));
    }

    public function softdelete($id){
        $t
    }
}
