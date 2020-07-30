<?php

namespace App\Http\Controllers;

use App\AssignedTask;
use App\AssignName;
use App\Ptask;
use App\Submission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildController extends Controller
{
    public function index(){
        $point = Submission::where('child_id',Auth::guard('child')->id())->sum('gained_mark');
        return view('child.childDashboard',compact('point'));
    }

    public function searchParent(){
        $search = request('search_value');
        $users = \App\User::where('username','LIKE','%'.$search.'%')->paginate(10);
        return view('child.searchParent',compact('users'));
    }

    public function addParent($id){
        AssignName::create([
            'parent_id' => $id,
            'child_id' => Auth::guard('child')->id(),
        ]);
        return redirect()->back();
    }


    public function showGetTask(){
        $users = AssignName::where('child_id',Auth::guard('child')->id())->get();
        return view('child.getTask',compact('users'));
    }

    
    public function showAddTask($pid){
        $tasks =Ptask::where('user_id', $pid)
            ->leftJoin('assigned_tasks', 'ptasks.id', '=', 'assigned_tasks.task_id')
            ->select('ptasks.id','ptasks.user_id','assigned_tasks.task_id','assigned_tasks.child_id','assigned_tasks.t_done')->get();

        return view('child.assignTask',compact('tasks'));
    }

    public function addTask($tid){
        AssignedTask::create([
          'child_id' => Auth::guard('child')->id(),
          'task_id' => $tid,
          't_done' => 'incomplete'
        ]);

        return redirect()->back()->with('addSuccess','Successfully Added Task');
    }


    public function showAllTask(){
        $tasks = AssignedTask::where('child_id',Auth::guard('child')->id())->paginate(10);
        return view('child.showAllTask',compact('tasks'));
    }

    public function showSubmitTask($id){
        $task = Ptask::find($id);
        $asn = AssignedTask::where('child_id',Auth::guard('child')->id())->where('task_id',$id)->get();

        $asn_id = $asn->first()->id;
        return view('child.submitTask',compact(['task','asn_id']));
    }


    public function submitTask($id,Request $request){
        AssignedTask::find($id)->update([
            't_done' => 'completed'
        ]);

        $nimg = uniqid().'.jpg';
        $img = request('pr_img');
        if(isset($img)){
            Submission::create([
                'assign_id' => $id,
                'details' => request('t_done'),
                'pr_img' => $nimg,
                'gained_mark' => 0,
                'child_id' => Auth::guard('child')->id(),
                'parent_id' => Ptask::where('id',AssignedTask::where('id',$id)->first()->task_id)->first()->user_id
            ]);

        }else{
            Submission::create([
                'assign_id' => $id,
                'details' => request('t_done'),
                'pr_img' => 'no image',
                'gained_mark' => 0,
                'child_id' => Auth::guard('child')->id(),
                'parent_id' => Ptask::where('id',AssignedTask::where('id',$id)->first()->task_id)->first()->user_id
            ]);

        }

        if ( $request->pr_img == null){

        }else{
            $request->pr_img->move('images',$nimg);
        }
        return redirect('/child/showTask')->with('submitSuccess','Successfully Submitted Task');

    }

}
