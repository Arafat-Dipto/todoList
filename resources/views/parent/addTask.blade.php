@extends('layouts.parentMaster')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Task</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                @if(session('taskAddedSuccess'))
                    <p class="alert alert-success">{{ session('taskAddedSuccess') }}</p>
                @endif
                <div class="card p-3">
                    @include('partials.errors')
                    <form action="{{ route('parent.addTask') }}" method="POST">
                        {{ csrf_field() }}
                        <label>Task Name</label>
                        <input type="text" name="task_name" class="form-control"><br>
                        <label>Reward Point</label>
                        <input type="number" name="task_point" class="form-control"><br>
                        <div class="checkbox">
                            <label><input type="checkbox" name="proof" value="1">Proof</label>
                        </div>
                        <input type="submit" name="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection