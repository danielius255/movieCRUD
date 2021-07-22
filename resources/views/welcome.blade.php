@extends('layouts.app')
@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                        <div class="pull-right">
                            
                            You can see, store and edit movies here ->
                            <a class="btn btn-success" href="{{ route('movies.index')}}">MOVIES</a>
                            <br><br>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

