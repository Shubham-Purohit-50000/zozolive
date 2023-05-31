@extends('layouts.stream-layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Streams') }}</div>

                    <div class="card-body">
                        @foreach($streams as $stream)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <img src="{{ asset($stream->thumbnail_url) }}" alt="{{ $stream->title }}" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h4>{{ $stream->title }}</h4>
                                    <p>{{ $stream->description }}</p>
                                    <a href="{{ route('streams.show', $stream->uuid) }}" class="btn btn-primary">{{ __('Watch Stream') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
