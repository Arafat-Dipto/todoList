<?php

namespace App\Http\Controllers;

use App\AssignedTask;
use App\Child;
use App\Ptask;
use App\Reward;
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
            return redirect()->back()->with('taskAddedSuccess','Successfully Added Task');
        }

    }

    public function showCreateReward(){
        return view('parent.createReward');
    }

    public function createReward(){
        $this->validate(request(),[
            'r_name' => 'required',
            'r_point' => 'required',

        ]);

        Reward::create([
            'r_name' => request('r_name'),
            'r_point' => request('r_point'),
            'parent_id' => Auth::id()
        ]);
        return redirect()->back()->with('createSuccess','Successfully Created Reward');;
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
        Ptask::find($id)->update([
            'task_name' => request('task_name'),
            'point' => request('task_point'),
            'proof' => 1,
            'task_done' => 0
        ]);
        return redirect('/parent/showTask');

    }

    public function deleteTask($id){
        Ptask::find($id)->delete();
        return redirect()->back();
    }

    public function showReward(){
        $rewards = Reward::where('parent_id',Auth::id())->paginate(10);
        return view('parent.showAllReward',compact('rewards'));
    }

    public function showEditReward($id){
        $reward = Reward::find($id);
        return view('parent.showEditReward',compact('reward'));
    }

    public function editReward($id){
        Reward::find($id)->update([
            'r_name' => request('r_name'),
            'r_point' => request('r_point'),

        ]);
        return redirect('/parent/showReward');

    }

    public function deleteReward($id){
        Reward::find($id)->delete();
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
