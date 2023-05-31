<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;

;

class StreamController extends Controller
{
    public function index()
    {
//        $streams = Stream::all();
        return inertia('Stream/Index');
//        return view('streams.index', compact('streams'));
    }

    public function store(Request $request)
    {
        $stream = Stream::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'stream_key'  => uniqid(),
            'user_id'     => 'c5a991da-b359-45aa-b5ce-c8370aa24038'
        ]);

        return response()->json(['stream_key' => $stream->stream_key]);
    }

    public function create()
    {
        return view('streams.create');
    }

    public function show(Stream $stream)
    {
        return view('streams.show', compact('stream'));
    }

    public function edit(Stream $stream)
    {
        return view('streams.edit', compact('stream'));
    }

    public function update(Request $request, Stream $stream)
    {
        $stream->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('streams.show', $stream);
    }

    public function play(Stream $stream)
    {
        $file = storage_path("app/{$stream->user_id}/{$stream->stream_key}/{$stream->stream_key}.m3u8");

        if (!file_exists($file)) {
            abort(404);
        }

        return response()->file($file);
    }

    public function startStream(Request $request)
    {
        // Get the user ID from the request
        $userId = $request->input('user_id');

        // Get the video file from the request
        $videoFile = $request->file('video_file');

        // Set the video file name
        $videoFileName = $userId . '-' . time() . '.ts';

        // Move the video file to the storage directory
        $videoFile->move(storage_path('app/public'), $videoFileName);

        // Get the path to the video file
        $videoFilePath = storage_path('app/public') . '/' . $videoFileName;

        // Set up the FFmpeg command to create an HLS stream
        $ffmpegCommand = 'ffmpeg -i ' . $videoFilePath . ' -hls_time 10 -hls_list_size 0 -hls_segment_filename ' . storage_path('app/public') . '/' . $userId . '-%d.ts ' . storage_path('app/public') . '/' . $userId . '.m3u8';

        // Execute the FFmpeg command
        exec($ffmpegCommand);

        // Return the path to the HLS stream
        return response()->json([
            'hls_url' => url('storage/' . $userId . '.m3u8')
        ]);
    }

    public function viewStream()
    {
        return inertia('Stream/Viewer');
    }


}
