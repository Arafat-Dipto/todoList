@extends('layouts.parentMaster')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Reward</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                @if(session('createSuccess'))
                    <p class="alert alert-success">{{ session('createSuccess') }}</p>
                @endif
                <div class="card p-3">
                    @include('partials.errors')
                    <form action="{{ route('parent.createReward') }}" method="POST">
                        {{ csrf_field() }}
                        <label>Reward Name</label>
                        <input type="text" name="r_name" class="form-control"><br>
                        <label>Reward Point</label>
                        <input type="number" name="r_point" class="form-control"><br>

                        <input type="submit" name="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection