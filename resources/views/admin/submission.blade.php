@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Submissions</h1>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Submission
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Message</th>
                            <th>Proof</th>
                            <th>Task point</th>
                            <th>Mark</th>
                            <th>Sub Username</th>
                            <th>Dom Username</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $key => $s)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ App\Ptask::where('id',App\AssignedTask::where('id',$s->assign_id)->first()->task_id)->first()->task_name }}</td>
                                <td>{{ $s->details }}</td>
                                <td class="text-center"><img src="{{ asset('/images/'.$s->pr_img) }}" alt="" width="150px" height="100px"></td>
                                <td>{{ App\Ptask::where('id',App\AssignedTask::where('id',$s->assign_id)->first()->task_id)->first()->point }}</td>
                                <td>{{ $s->gained_mark }}</td>
                                <td>{{ App\Child::find($s->child_id)->username }}</td>
                                <td>{{ App\User::find($s->parent_id)->username }}</td>
                                <td>
                                    &nbsp;&nbsp;<a onclick="return confirm('are you sure?');"  class="btn btn-danger btn-sm" href="{{ url('/admin/'.$s->id.'/deleteTask') }}">Delete</a></td>
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