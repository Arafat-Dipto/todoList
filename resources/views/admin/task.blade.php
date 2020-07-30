@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Tasks</h1>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Task
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Reward Point</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $key => $task)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->point }}</td>
                                <td>{{ App\User::find($task->user_id)->username }}</td>
                                <td>
                                    <a href="{{ route('admin.taskEditShow',$task->id) }}" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;

                                    &nbsp;&nbsp;<a onclick="return confirm('are you sure?');"  class="btn btn-danger btn-sm" href="{{ url('/admin/'.$task->id.'/deleteTask') }}">Delete</a></td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    </div>
@endsection