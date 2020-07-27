@extends('layouts.parentMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Task Manager</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Tasks
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Task</th>
                                <th>Task POint</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $task)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ $task->point }}</td>
                                    <td>
                                        <a href="{{ route('parent.taskEdit',$task->id) }}" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
                                        <a onclick="return confirm('are you sure?');" class="btn btn-danger btn-sm" href="{{ route('parent.taskDelete',$task->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $tasks->links() }}
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