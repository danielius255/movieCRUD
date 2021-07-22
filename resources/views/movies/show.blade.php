@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        @endif

                   
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2> Show Movie</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('movies.index') }}">Back</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>ID:</strong>
                                    {{ $movie->id }}
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {{ $movie->title }}
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Description:</strong>
                                    {{ $movie->description }}
                                </div>

                             </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>IMDB:</strong>
                                    {{ $movie->imdb }}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <br>

                                    @if (($media = $movie->getMedia())&& $media->isNotEmpty())
                                        <img  src="{{$media->first()->getUrl('thumb')}}" />
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Seen:</strong>
                                    @if( $movie->seen ==1)
                                        Seen
                                    @else
                                        Not Seen
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                    <strong>Schedule:</strong>
                                    {{ $movie->schedule }}
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