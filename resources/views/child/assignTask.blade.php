@extends('layouts.childMaster')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dom Tasks</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="row mt-3">
                <div class="col-lg-12">
                    @if(session('addSuccess'))
                        <p class="alert alert-success">{{ session('addSuccess') }}</p>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dom Task List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Dom</th>
                                        <th>Task</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($tasks as $key => $task)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ \App\User::where('id',$task->user_id)->first()->username }}</td>
                                            <td>{{ \App\Ptask::where('id',$task->id)->first()->task_name }}</td>
                                            @if($task->t_done == NULL)
                                                <td><a href="{{ route('child.addTask',$task->id) }}" class="btn btn-primary btn-sm">Add</a></td>
                                            @else
                                            <td>{{ $task->t_done }}</td>
                                            @endif

                                        </tr>
                                    @endforeach
{{--                                    {{ $users->links() }}--}}
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
        </div>
    </div>
@endsection