@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Add New Movie</h2>
                                </div>
                                <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('movies.index') }}">Back</a>
                                </div>
                            </div>   
                        </div>

                    @if ($errors->any())

                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with yourinput.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Title:</strong>
                                        <input type="text" name="title" class="form-control"placeholder="Title">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <textarea class="form-control" style="height:150px"name="description" placeholder="Description of the movie"></textarea>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>IMDB link:</strong>
                                    <input type="text" name="imdb" class="form-control"placeholder="add an image">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control"placeholder="add an image">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Seen:</strong>
                                    <br>
                                    <input type="checkbox" id="seen" name="seen" value="1">
                                    <label for="seen"> I have seen this movie</label><br>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Schedule:</strong>
                                    <input type="datetime-local" name="schedule" class="form-control"placeholder="Datepicker">
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection