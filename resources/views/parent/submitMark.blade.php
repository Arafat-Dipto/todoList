@extends('layouts.parentMaster')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Give Mark</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('parent.submitMark',$sub_id) }}" method="POST">
                {{ csrf_field() }}
                <input type="number" class="form-control" placeholder="give your mark here..." name="gained_mark"><br>

                <input type="submit" class="btn btn-primary" name="submit" value="Submit">

            </form>
        </div>
    </div>


@endsection