@extends('layouts.parentMaster')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Submitted Tasks</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Children Tasks
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Child Name</th>
                                <th>Task</th>
                                <th>Proof Text</th>
                                <th>Proof Image</th>
                                <th>Reward Point</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $task)
                                <tr>
                                    @if($task->gained_mark == 0 && (App\Ptask::where('id',App\AssignedTask::where('id',$task->assign_id)->first()->task_id)->first()->user_id == \Illuminate\Support\Facades\Auth::id() ))
                                        <td>{{ $key+1 }}</td>
{{--                                    <td>{{ dd(App\Ptask::where('id',App\AssignedTask::where('id',$task->assign_id)->first()->task_id)->first()->user_id) }}</td>--}}
                                        <td>{{ App\Child::where('id',App\AssignedTask::where('id',$task->assign_id)->first()->child_id)->first()->username }}</td>
                                        <td>{{ App\Ptask::where('id',App\AssignedTask::where('id',$task->assign_id)->first()->task_id)->first()->task_name }}</td>
                                        <td>{{ $task->details }}</td>
                                        <td class="text-center"><img src="{{ asset('/images/'.$task->pr_img) }}" alt="" width="150px" height="100px"></td>
                                        <td>{{ App\Ptask::where('id',App\AssignedTask::where('id',$task->assign_id)->first()->task_id)->first()->point }}</td>
                                        <td>
                                            <a href="{{ route('parent.showSubmitMark',$task->id) }}" class="btn btn-primary btn-sm">Submit</a>&nbsp;&nbsp;
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
{{--                            {{ $tasks->links() }}--}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
    </div>
@endsection