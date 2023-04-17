<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function addContent(Request $request)
    {
        $request->validate([
            'judul_materi' => 'required',
            'link_youtube' => 'required|url',
        ]);

        $link = $request->input('link_youtube');
        if (strpos($link, "youtube.com") !== false || strpos($link, "youtu.be") !== false) {
            $video_id = substr($link, strpos($link, "=") + 1);
            if (empty($video_id)) {
                $video_id = substr($link, strrpos($link, "/") + 1);
            }
            $judul_materi = $request->input('judul_materi');
            return view('datamateri', compact('video_id', 'judul_materi'));
        } else {
            return back()->withErrors(['link_youtube' => 'Invalid YouTube link.']);
        }
    }
}
