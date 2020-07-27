@extends('layouts.childMaster')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Search Parent</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ url('/child/search/parent') }}" method="GET" class="d-flex" style="margin-bottom: 20px;">
                <input type="text" class="form-control " style="width: 550px; display: inline-block"  name="search_value" placeholder="Enter Parent's Username..."> <input type="submit" class="btn btn-outline-secondary btn-md" name="Search" value="Search">
            </form>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parent List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Parent Name</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>

                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                @if(\App\AssignName::where('parent_id',$user->id)->where('child_id',\Illuminate\Support\Facades\Auth::guard('child')->id())->count() == 0)
                                                <a href="{{ route('child.addParent',$user->id) }}" class="btn btn-primary btn-sm">Connect</a>&nbsp;&nbsp;
                                                @else
                                                    <p class="text-success">Connected</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $users->links() }}
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