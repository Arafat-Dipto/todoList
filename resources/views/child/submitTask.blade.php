@extends('layouts.childMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Submit Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('child.submitTask',$asn_id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" class="form-control" placeholder="write task done message..." name="t_done"><br>
                @if(App\Ptask::find($task->id)->proof == 1)

                <label>Prove Image</label>
                <input type="file" name="pr_img" accept="image/*" class="form-control mb-3"><br>
                @endif
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">

            </form>
        </div>
    </div>


@endsection