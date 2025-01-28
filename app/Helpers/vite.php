<?php

if (!function_exists('vite')) {
    function vite($path)
    {
        $manifest = json_decode(file_get_contents(public_path('dist/.vite/manifest.json')), true);
        return asset('dist/' . $manifest[$path]['file']);
    }
}