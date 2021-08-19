<?php

use App\Models\Option;

if (! function_exists('getOption')) {
    /**
     * @param string $text
     * @param int $limit character
     */
    function getOption() {
        $result = Option::first();
        return $result;
    }
}