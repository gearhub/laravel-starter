<?php

use Mockery as m;

class HelpersTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function it_converts_array_keys_from_camel_case_to_snake_case()
    {
        $array = [
            'foo'    => 'bar',
            'fooBar' => 'fooBar',
            'barBaz' => 'fooBarBaz'
        ];

        $expected = [
            'foo'     => 'bar',
            'foo_bar' => 'fooBar',
            'bar_baz' => 'fooBarBaz'
        ];

        $this->assertEquals($expected, array_keys_camel_to_snake($array));
    }

    /**
     * @test
     */
    public function it_converts_array_keys_from_dash_case_to_camel_case()
    {
        $array = [
            'foo'     => 'bar',
            'foo-bar' => 'fooBar',
            'bar-baz' => 'fooBarBaz'
        ];

        $expected = [
            'foo'    => 'bar',
            'fooBar' => 'fooBar',
            'barBaz' => 'fooBarBaz'
        ];

        $this->assertEquals($expected, array_keys_dash_to_camel($array));
    }

    /**
     * @test
     */
    public function it_converts_string_from_dash_case_to_camel_case()
    {
        $string   = 'foo-bar';
        $expected = 'fooBar';

        $this->assertEquals($expected, string_dash_to_camel($string));
    }
}
