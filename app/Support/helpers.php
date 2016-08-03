<?php

if (! function_exists('array_keys_to_snake')) {

    /**
     * Convert the keys of an array to snake case.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_keys_to_snake($array)
    {
        return array_build($array, function($key, $value) {
            return [
                snake_case($key),
                $value
            ];
        });
    }
}

if (! function_exists('generate_uuid')) {

    /**
     * Generate a UUID according to RFC 4122 standard.
     *
     * @param  int|string $version
     *
     * @return string
     */
    function generate_uuid($version = 4)
    {
        return Uuid::generate($version);
    }
}
