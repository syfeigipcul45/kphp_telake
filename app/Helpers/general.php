<?php

use App\Models\Option;
use App\Models\Video;
use Illuminate\Support\Str;

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

if (! function_exists('convertToRupiah')) {
    function convertToRupiah($value) {
        $rupiah_result = "Rp " . number_format($value, 2, ',', '.');
        return $rupiah_result;
    }
}

if (! function_exists('convertToMonth')) {
    function convertToMonth($value) {
        return $value . ' bulan';
    }
}

if (! function_exists('convertToCm')) {
    function convertToCm($value) {
        return $value . ' cm';
    }
}

if (! function_exists('convertWhatsappNumber')) {
    function convertWhatsappNumber($whatsapp) {
        $whatsappNumber = null;
        if(substr($whatsapp, 0, 2) == '08') {
            $whatsappNumber = '628' . substr($whatsapp, 2);
        } elseif(substr($whatsapp, 0, 3) == '+62') {
            $whatsappNumber = '62' . substr($whatsapp, 3);
        } else {
            $whatsappNumber = $whatsapp;
        }
        return $whatsappNumber;
    }
}

function convertToSlug($string){
    $string = strtolower($string);
    $string = html_entity_decode($string);
    $string = str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),$string);
    $string = preg_replace('#[^\w\säüöß]#','',$string);
    $string = preg_replace('#[\s]{2,}#',' ',$string);
    $string = str_replace(array(' '),array('-'),$string);
    return $string;
}

function convertDate($date){
    return date('d M Y', strtotime($date));
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

if (! function_exists('getYoutubeEmbedUrl')) {
    /**
     * @param string $text
     */
    function getYoutubeEmbedUrl($url) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}

if (! function_exists('shrinkText')) {
    function shrinkText($text) {
        return Str::limit($text, 225, '...');
    }
}