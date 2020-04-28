<?php

namespace App\Services;

/**
 * This is a service to load from the storage the registered routes,
 * in this case we use the filesystem, but if you want to use a mongodb,
 * redis, memcached fell free to implement.
 *
 * Class StorageService
 * @package App\Services
 */
class StorageService {

    public static function get(string $filename) {
        $location = env('ROUTER_LOCATION', storage_path('app/')).$filename;
        return file_get_contents($location);
    }

    public static function put(string $filename, string $content) {
        $location = env('ROUTER_LOCATION', storage_path('app/')).$filename;
        return file_put_contents($location, $content);
    }

    public static function exists(string $filename) {
        $location = env('ROUTER_LOCATION', storage_path('app/')).$filename;
        return file_exists($location);
    }

}