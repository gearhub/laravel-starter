<?php

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
