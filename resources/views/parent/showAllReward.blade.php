@extends('layouts.parentMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reward Manager</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Rewards
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Reward</th>
                                <th>Reward Point</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rewards as $key => $reward)
                                <tr>

                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $reward->r_name }}</td>
                                    <td>{{ $reward->r_point }}</td>
                                    <td>
                                        <a href="{{ route('parent.rewardEdit',$reward->id) }}" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
                                        <a onclick="return confirm('are you sure?');" class="btn btn-danger btn-sm" href="{{ route('parent.rewardDelete',$reward->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $rewards->links() }}
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