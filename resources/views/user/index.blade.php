@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Movies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right">
 <a class="btn btn-success" href="{{ route('movies.create')
}}"> Add new movie</a>
<a class="btn btn-success" href="{{ route('movies.create')
}}"> Your movies</a>
 </div>
 <br>
                    
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Title</th>
<th>Description</th>
<th>IMDB</th>
<th>Image</th>
<th>Seen</th>
<th>Schedule</th>
<th width="280px">Action</th>
</tr>
@foreach ($movies as $movie)
<tr>
<td>{{ $movie->id }}</td>
<td>{{ $movie->title }}</td>
<td>{{ $movie->description }}</td>
<td><a href="{{ $movie->imdb }}">Continue</a></td>
<td>{{ $movie->image }}</td>
<td>{{ $movie->seen }}</td>
<td>{{ $movie->schedule }}</td>
<td>

<form action="{{ route('movies.destroy',$movie->id) }}"
method="POST">

 <a class="btn btn-info" href="{{
route('movies.show',$movie->id) }}">Show</a>

 <a class="btn btn-primary" href="{{
route('movies.edit',$movie->id) }}">Edit</a>

 @csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>

{!! $movies->links() !!}
               </div>
           </div>
       </div>
   </div>
</div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection