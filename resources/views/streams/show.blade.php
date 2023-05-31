@extends('layouts.stream-layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $stream->title }}</div>

                    <div class="card-body">
                        <video id="player" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{"fluid": true}'>
                            <source src="{{ route('streams.play', $stream->uuid) }}" type="application/x-mpegURL">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>
    <script>
        var player = videojs('player');

        if (Hls.isSupported()) {
            var hls = new Hls();
            hls.loadSource("{{ route('streams.play', $stream->uuid) }}");
            hls.attachMedia(player.el());
            hls.on(Hls.Events.MANIFEST_PARSED,function() {
                player.play();
            });
        } else if (player.canPlayType('application/vnd.apple.mpegurl')) {
            player.src = "{{ route('streams.play', $stream->uuid) }}";
            player.addEventListener('loadedmetadata',function() {
                player.play();
            });
        }
    </script>
@endsection
