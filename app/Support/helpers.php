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
