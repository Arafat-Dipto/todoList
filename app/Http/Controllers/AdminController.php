<?php

namespace App\Http\Controllers;

use App\Child;
use App\Ptask;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.adminDashboard');
    }

    public function showlogin(){
        return view('admin.login');
    }

    public function login(){
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['username' => request('username'), 'password' => request('password'),'role' => 'admin'])){
            return redirect('admin/dashboard');
        }else{
            return 'credential does not match';

        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');

    }

    public function showParent(){
        $parents = User::all();
        return view('admin.parents',compact('parents'));
    }

    public function disableParent($id){
        User::find($id)->update([
            'verified' => 0
        ]);
        return redirect()->back();
    }
    public function enableParent($id){
        User::find($id)->update([
            'verified' => 1
        ]);
        return redirect()->back();
    }

    public function deleteParent($id){
        User::find($id)->delete();
        return redirect()->back();
    }


    public function showChildren(){
        $children = Child::all();
        return view('admin.children',compact('children'));
    }

    public function disableChildren($id){
        Child::find($id)->update([
            'verified' => 0
        ]);
        return redirect()->back();
    }
    public function enableChildren($id){
        Child::find($id)->update([
            'verified' => 1
        ]);
        return redirect()->back();
    }

    public function deleteChildren($id){
        Child::find($id)->delete();
        return redirect()->back();
    }



    public function showTask(){
        $tasks = Ptask::all();
        return view('admin.task',compact('tasks'));
    }

    public function showEditTask($id){
        $users = User::select('username')->get();
        $task = Ptask::find($id);
        return view('admin.editTask',compact(['task','users']));
    }

    public function editTask($id){
        $u_id = User::where('username',request('user_id'))->get();

        Ptask::find($id)->update([
            'task_name' => request('task_name'),
            'point' => request('point'),
            'user_id' => $u_id->first()->id
        ]);
        return redirect('/admin/task');
    }


    public function deleteTask($id){
        Ptask::find($id)->delete();
        return redirect()->back();
    }



    public function showSubmission(){
        $sub = Submission::all();
        return view('admin.submission',compact('sub'));
    }

    public function showEditSubmission($id){
        $users = User::select('username')->get();
        $task = Ptask::find($id);
        return view('admin.editTask',compact(['task','users']));
    }

    public function editSubmission($id){
        $u_id = User::where('username',request('user_id'))->get();

        Ptask::find($id)->update([
            'task_name' => request('task_name'),
            'point' => request('point'),
            'user_id' => $u_id->first()->id
        ]);
        return redirect('/admin/task');
    }

    public function deleteSubmission($id){
        Submission::find($id)->delete();
        return redirect()->back();
    }



}
