@extends('layouts.adminMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.taskEdit',$task->id) }}" class="form-group" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <input value="{{ $task->task_name }}" type="text" name="task_name" placeholder="Task Name" class="form-control"><br>
                <input value="{{ $task->point }}" type="number" name="point" placeholder="Task Point" class="form-control"><br>

                <label>Created By</label><br>
                <select name="user_id" id="" class="form-control">
                    @foreach($users as $user)
                        @if($user['username'] == $task->user->username)
                            <option selected value="{{ $task->user->username }}">{{ $user['username'] }}</option>
                        @else
                            <option value="{{ $user['username'] }}">{{ $user['username'] }}</option>
                        @endif
                    @endforeach
                </select><br>

                <input type="submit" name="submit" value="update" class="btn btn-primary btn-sm">
            </form>
        </div>
    </div>
@endsection

