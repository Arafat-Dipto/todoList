@extends('layouts.childMaster')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assigned Tasks</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if(session('taskAddedSuccess'))
                <p class="alert alert-success">{{ session('taskAddedSuccess') }}</p>
            @endif
            @if(session('submitSuccess'))
                <p class="alert alert-success">{{ session('submitSuccess') }}</p>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your Tasks
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Parent</th>
                                <th>Task</th>
                                <th>Reward Point</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $task)
                                <tr>
                                @if($task->t_done == 'incomplete')
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ \App\Ptask::find($task->task_id)->user->username }}</td>
                                    <td>{{ \App\Ptask::find($task->task_id)->task_name }}</td>
                                    <td>{{ \App\Ptask::find($task->task_id)->point }}</td>
                                    <td>
                                        <a href="{{ route('child.showSubmitTask',$task->task_id) }}" class="btn btn-primary btn-sm">Submit</a>&nbsp;&nbsp;
{{--                                        <a onclick="return confirm('are you sure?');" class="btn btn-danger btn-sm" href="{{ route('child.taskRemove',$task->id) }}">Remove</a>--}}
                                    </td>
                                    @endif
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