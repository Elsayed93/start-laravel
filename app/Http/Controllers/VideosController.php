<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Events\VideoViewer;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        $video = Video::first();
        event(new VideoViewer($video));                    //-------->>>>>>> Fire the Event
        return view('videos.index', compact('video'));
    }
}
