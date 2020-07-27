@extends('layouts.parentMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('parent.taskEdit',$task->id) }}" class="form-group" method="POST">
                {{ csrf_field() }}
                <label>Task Name</label>
                <input type="text" name="task_name" value="{{ $task->task_name }}" class="form-control"><br>
                <label>Reward Point</label>
                <input type="number" name="task_point" value="{{ $task->point }}" class="form-control"><br>
                @if(App\Ptask::find($task->id)->proof == 1)
                    <label><input type="checkbox" name="nproof" value="1" checked> Proof</label><br>
                @else
                    <label><input type="checkbox" name="nproof" value="0" > Proof</label><br>
                @endif
                <input type="submit" name="submit" value="update">
            </form>
        </div>
    </div>
@endsection

