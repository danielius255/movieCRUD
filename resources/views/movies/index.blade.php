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

                            <a class="btn btn-success" href="{{ route('movies.create')}}"> Add new movie</a>
                            <br><br>

                        </div>
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

                                @if (($media = $movie->getMedia())&& $media->isNotEmpty())
                                    <td><img  src="{{$media->first()->getUrl('thumb')}}" /></td> 
                                @else 
                                    <td></td>
                                @endif

                                @if( $movie->seen ==1)
                                <td>Seen</td>
                                @else
                                <td>Not seen</td>
                                @endif

                                <td>{{ $movie->schedule }}</td>
                                </tr>

                            @endforeach

                        </table>

                        {!! $movies->links() !!}
                        <br>

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

                            @foreach ($userMovies as $userMovie)

                                <tr>
                                <td>{{ $userMovie->id }}</td>
                                <td>{{ $userMovie->title }}</td>
                                <td>{{ $userMovie->description }}</td>
                                <td><a href="{{ $userMovie->imdb }}">IMDB</a></td>

                                @if (($media = $userMovie->getMedia())&& $media->isNotEmpty())
                                    <td><img  src="{{$media->first()->getUrl('thumb')}}" /></td> 
                                @else 
                                    <td></td>
                                @endif

                                @if( $userMovie->seen ==1)
                                    <td>Seen</td>
                                @else
                                    <td>Not seen</td>
                                @endif

                                <td>{{ $userMovie->schedule }}</td>
                                <td>
                                    <form action="{{ route('movies.destroy',$userMovie->id) }}"method="POST">

                                        <a class="btn btn-info" href="{{route('movies.show',$userMovie->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{route('movies.edit',$userMovie->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </table>
                                                        

                        <div class="pull-right">
                    
                            <br><h3>Upcoming movies</h3><br>

                        </div>


                    
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
                            </tr>

                                @foreach ($scheduledMovies as $scheduledMovie)

                                    <tr>
                                    <td>{{ $scheduledMovie->id }}</td>
                                    <td>{{ $scheduledMovie->title }}</td>
                                    <td>{{ $scheduledMovie->description }}</td>
                                    <td><a href="{{ $scheduledMovie->imdb }}">IMDB</a></td>

                                    @if (($media = $scheduledMovie->getMedia())&& $media->isNotEmpty())
                                        <td><img  src="{{$media->first()->getUrl('thumb')}}" /></td> 
                                    @else 
                                        <td></td>
                                    @endif

                                    @if( $scheduledMovie->seen ==1)
                                        <td>Seen</td>
                                    @else
                                        <td>Not seen</td>
                                    @endif

                                    <td>{{ $scheduledMovie->schedule }}</td>
                                    </tr>

                                @endforeach
                        </table>

                    {!! $movies->links() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection