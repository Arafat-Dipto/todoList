@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Children</h1>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Children Info
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($children as $key => $child)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $child->username }}</td>
                                <td>{{ $child->email }}</td>
                                <td>{{ $child->phone }}</td>
                                <td>
                                    @if($child->verified == 1)
                                        <a class="btn btn-warning btn-sm" href="{{ url('/admin/'.$child->id.'/disableChildren') }}">Disable</a>
                                    @else
                                        <a class="btn btn-success btn-sm" href="{{ url('/admin/'.$child->id.'/enableChildren') }}">Enable</a>
                                    @endif
                                    &nbsp;&nbsp;<a onclick="return confirm('are you sure?');"  class="btn btn-danger btn-sm" href="{{ url('/admin/'.$child->id.'/deleteChildren') }}">Delete</a></td>
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