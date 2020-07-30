@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Parents</h1>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Parent Info
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Dom Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parents as $key => $parent)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $parent->username }}</td>
                                <td>{{ $parent->email }}</td>
                                <td>{{ $parent->phone }}</td>
                                <td>
                                    @if($parent->verified == 1)
                                        <a class="btn btn-warning btn-sm" href="{{ url('/admin/'.$parent->id.'/disableParent') }}">Disable</a>
                                    @else
                                        <a class="btn btn-success btn-sm" href="{{ url('/admin/'.$parent->id.'/enableParent') }}">Enable</a>
                                    @endif
                                    &nbsp;&nbsp;<a onclick="return confirm('are you sure?');"  class="btn btn-danger btn-sm" href="{{ url('/admin/'.$parent->id.'/deleteParent') }}">Delete</a></td>
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