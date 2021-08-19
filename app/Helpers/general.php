<?php

use App\Models\Option;
use App\Models\Video;

if (! function_exists('getOption')) {
    function getOption() {
        $result = Option::first();
        return $result;
    }
}

if (! function_exists('getVideos')) {
    function getVideos() {
        $result = Video::limit(3)->get();
        return $result;
    }
}

if (! function_exists('convertYoutube')) {
    /**
     * @param string $text
     */
    function convertYoutube($link) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $link
        );
    }
}