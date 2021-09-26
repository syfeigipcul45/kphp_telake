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

if (! function_exists('convertToRupiah')) {
    function convertToRupiah($value) {
        $rupiah_result = "Rp " . number_format($value, 2, ',', '.');
        return $rupiah_result;
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