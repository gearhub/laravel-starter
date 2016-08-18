<?php

if (! function_exists('array_keys_camel_to_snake')) {

    /**
     * Convert the keys of an array from camel to snake case.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_keys_camel_to_snake($array)
    {
        $keys   = array_keys($array);
        $values = array_values($array);

        $formatted = array_map(function($item) {
            return snake_case($item);
        }, $keys);

        return array_combine($formatted, $values);
    }
}

if (! function_exists('array_keys_dash_to_camel')) {

    /**
     * Convert the keys of an array from dashes to camel case.
     *
     * @param  array $array
     *
     * @return array
     */
    function array_keys_dash_to_camel($array)
    {
        $keys   = array_keys($array);
        $values = array_values($array);

        $formatted = array_map(function($item) {
            return string_dash_to_camel($item);
        }, $keys);

        return array_combine($formatted, $values);
    }
}

if (! function_exists('string_dash_to_camel')) {

    /**
     * Convert string from dashes to camel case.
     *
     * @param  string $string
     *
     * @return string
     */
    function string_dash_to_camel($string)
    {
        return camel_case(studly_case($string));
    }
}
