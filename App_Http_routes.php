<?php

Route::get('/player', function () {
    $video = "video/os_simpsons_s25e22_720p.mp4";
    $mime = "video/mp4";
    $title = "Os Simpsons";

    return view('player')->with(compact('video', 'mime', 'title'));
});

Route::get('/video/{filename}', function ($filename) {
    // Pasta dos videos.
    $videosDir = base_path('resources/assets/videos');

    if (file_exists($filePath = $videosDir."/".$filename)) {
        $stream = new \App\Http\VideoStream($filePath);

        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }

    return response("File doesn't exists", 404);
});
echo "its first commit is for first time learnig ";
echo "its first commit is for first time learnig ";
