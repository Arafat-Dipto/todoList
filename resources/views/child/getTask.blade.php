@extends('layouts.childMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Get Your Tasks</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your Tasks
                </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Parent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr>

                                <td>{{ $key+1 }}</td>
                                <td>{{ App\User::find($user->parent_id)->username }}</td>
                                <td>

                                    <a href="{{ route('child.getTask',$user->parent_id) }}" class="btn btn-warning btn-sm">Get task</a>&nbsp;&nbsp;
                                    {{--                                        <a onclick="return confirm('are you sure?');" class="btn btn-danger btn-sm" href="{{ route('child.taskRemove',$task->id) }}">Remove</a>--}}
                                </td>
                            </tr>
                                @endforeach


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