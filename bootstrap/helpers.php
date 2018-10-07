<?php

if ( ! function_exists('config_path'))  {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '') {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('base_path'))  {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function base_path($path = '') {
        return app()->basePath() . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('dd'))  {
    function dd($data) {
        var_dump($data);
        die();
    }
}

if ( ! function_exists('routes'))  {
    /**
     * Get Route by ID or return all
     * @param int $id
     * @return mixed
     */
    function routes($id = null) {
        $routes = \App\Endpoint::parse(file_get_contents(storage_path('app/router.json')));
        if(is_numeric($id)){
            return $routes[$id - 1];
        }
        return $routes;
    }
}

