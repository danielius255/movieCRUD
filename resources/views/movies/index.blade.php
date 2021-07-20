@extends('layouts.app')

@section('content')
<div >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right">
 <a class="btn btn-success" href="{{ route('movies.create')
}}"> Add new movie</a>


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

@foreach ($movies as $movie)
<tr>
<td>{{ $movie->id }}</td>
<td>{{ $movie->title }}</td>
<td>{{ $movie->description }}</td>
<td><a href="{{ $movie->imdb }}">IMDB</a></td>
 {{-- <td><img height="80px" src="{{ asset('storage/movie/' . $movie->image) }}" /></td> --> --}}
<td>{{ $movie->seen }}</td>
<td>{{ $movie->schedule }}</td>

</tr>
@endforeach
</table>

{!! $movies->links() !!}

<div class="pull-right">
 
<h3>Your movies</h3>
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
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->title }}</td>
<td>{{ $user->description }}</td>
<td><a href="{{ $user->imdb }}">IMDB</a></td>
{{-- <td><img height="80px" src="{{ asset('storage/movie/' . $user->image) }}" /></td> --> --}}
<td>{{ $user->seen }}</td>
<td>{{ $user->schedule }}</td>
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


<div class="pull-right">
 
<h3>Upcoming movies</h3>
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

@foreach ($dates as $date)

<tr>
<td>{{ $date->id }}</td>
<td>{{ $date->title }}</td>
<td>{{ $date->description }}</td>
<td><a href="{{ $date->imdb }}">IMDB</a></td>
@if (($media = $date->getMedia())&& $media->isNotEmpty())
  <td><img  src="{{$media->first()->getUrl('thumb')}}" /></td> 
  @else 
  <td></td>
  @endif
<td>{{ $date->seen }}</td>
<td>{{ $date->schedule }}</td>
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