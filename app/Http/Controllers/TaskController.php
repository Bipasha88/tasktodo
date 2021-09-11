<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Response;
use View;
use File;

class TaskController extends Controller
{
    public function index(){
        $id = request()->user()->id;
        $api_data = Task::where("user_id",$id)->get();
        return view('task.alltasks',compact('api_data'));
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        Task::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route("dashboard");
    }

    public function softdelete($id){
        Task::find($id)->delete();

        return redirect()->route("dashboard");
    }

    public function completeTask($id){
        $task = Task::find($id);
        $task->status = "1";
        $task->save();
        return redirect()->route("dashboard");
    }

    public function pendingTask($id){
        $task = Task::find($id);
        $task->status = "0";
        $task->save();
        return redirect()->route("dashboard");
    }

    public function deletedTasksList(){
        $id = request()->user()->id;
        $api_data = Task::where("user_id",$id)->onlyTrashed()->get();
        return view('task.deletedtasks',compact('api_data'));
    }

    public function retriveDeletedTask($id){
        $task = Task::withTrashed()->find($id)->restore();;
        return redirect()->route("dashboard");
    }
    public function jsonFileDownload()
    {
        $id = request()->user()->id;
        $api_data = Task::withTrashed()->where("user_id",$id)->get();

        $data = json_encode($api_data);

        $jsongFile = time() . '_file.json';

        File::put(public_path('/upload/json/'.$jsongFile), $data);

        return Response::download(public_path('/upload/json/'.$jsongFile));
    }
}
