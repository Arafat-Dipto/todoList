<?php

namespace App\Http\Controllers;

use App\AssignedTask;
use App\Child;
use App\Ptask;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function index(){
        return view('parent.parentDashboard');
    }

    public function showAddTask(){
        return view('parent.addTask');
    }

    public function addTask(){
        $this->validate(request(),[
            'task_name' => 'required',
            'task_point' => 'required',

        ]);


        if (request('proof') == 1){
            User::find(Auth::id())->ptasks()->create([
                'task_name' => request('task_name'),
                'point' => request('task_point'),
                'proof' => 1,
                'task_done' => 0
                ]);

            return redirect()->back()->with('taskAddedSuccess','Successfully Added Task');;
        }else{
            User::find(Auth::id())->ptasks()->create([
                'task_name' => request('task_name'),
                'point' => request('task_point'),
                'proof' => 0,
                'task_done' => 0
            ]);
            return redirect()->back()->with('taskAddedSuccess','Successfully Added Task');;
        }

    }

    public function showTask(){
        $tasks = Ptask::where('user_id',Auth::id())->paginate(10);
        return view('parent.showAllTaskP',compact('tasks'));
    }


    public function showEditTask($id){
        $task = Ptask::find($id);
        return view('parent.showEditTask',compact('task'));
    }

    public function editTask($id){

//        if (request('nproof') == 1) {
            Ptask::find($id)->update([
                'task_name' => request('task_name'),
                'point' => request('task_point'),
                'proof' => 1,
                'task_done' => 0
            ]);
            return redirect('/parent/showTask');
//        }else{
//            Ptask::find($id)->update([
//                'task_name' => request('task_name'),
//                'point' => request('task_point'),
//                'proof' => 0,
//                'task_done' => 0
//            ]);
//            return redirect('/parent/showTask');
//        }

    }

    public function deleteTask($id){
        Ptask::find($id)->delete();
        return redirect()->back();
    }

    public function showSubmittedTask(){
        $tasks = Submission::all();

        return view('parent.showSubmittedTask',compact('tasks'));
    }

    public function showSubmitMark($id){
        $sub_id = $id;
        return view('parent.submitMark',compact('sub_id'));
    }
    public function submitMark($id){
        Submission::find($id)->update([
            'gained_mark' => request('gained_mark')
        ]);

        return redirect('/parent/showSubmittedTask');
    }
}
