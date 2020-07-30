@extends('layouts.parentMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Reward</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('parent.rewardEdit',$reward->id) }}" class="form-group" method="POST">
                {{ csrf_field() }}
                <label>Task Name</label>
                <input type="text" name="r_name" value="{{ $reward->r_name }}" class="form-control"><br>
                <label>Reward Point</label>
                <input type="number" name="r_point" value="{{ $reward->r_point }}" class="form-control"><br>
                <input type="submit" name="submit" value="update">
            </form>
        </div>
    </div>
@endsection

