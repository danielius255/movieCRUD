@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left">
 <h2>Edit Movie</h2>
 </div>
 <div class="pull-right">
 <a class="btn btn-primary" href="{{ route('movies.index') }}">
Back</a>
 </div>
 </div>
 </div>

 @if ($errors->any())
 <div class="alert alert-danger">
 <strong>Whoops!</strong> There were some problems with your
input.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif

 <form action="{{ route('movies.update',$movie->id) }}" method="POST">
 @csrf
 @method('PUT')
<br>
 <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Title:</strong>
<input type="text" name="title" value="{{ $movie->title }}"
class="form-control" placeholder="Title">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Description:</strong>
 <textarea class="form-control" style="height:150px"
name="description" placeholder="Description">{{ $movie->description }}</textarea>
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>IMDB:</strong>
<input type="text" name="imdb" value="{{ $movie->image }}"
class="form-control" placeholder="Image**">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Image:</strong>
<input type="text" name="image" value="{{ $movie->image }}"
class="form-control" placeholder="Image**">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Seen:</strong>
<input type="text" name="title" value="{{ $movie->seen }}"
class="form-control" placeholder="Seen**">
 </div>
 </div><div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>Schedule:</strong>
<input type="text" name="Schedule" value="{{ $movie->schedule }}"
class="form-control" placeholder="Schedule">
 </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
 <div class="form-group">
 <strong>User:</strong>
<input type="text" name="user" value="{{ $movie->user }}"
class="form-control" placeholder="User">
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