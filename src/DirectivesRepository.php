<?php

namespace Ajtarragona\TComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class DirectivesRepository
{
    /**
     * Register the directives.
     *
     * @param  array $directives
     * @return void
     */
    public static function register(array $directives)
    {
        
        collect($directives)->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }

    /**
     * Register the directives.
     *
     * @param  array $components
     * @return void
     */
    public static function registerComponents(array $components)
    {
        
        collect($components)->each(function ($name, $viewOrClass) {
            // dump($name);
            Blade::component($name, Str::snake($viewOrClass));
        
           // Blade::directive($key, $item);
        });
    }

    /**
     * Parse expression.
     *
     * @param  string $expression
     * @return \Illuminate\Support\Collection
     */
    public static function parseMultipleArgs($expression)
    {
        return collect(explode(',', $expression))->map(function ($item) {
            return trim($item);
        });
    }

    /**
     * Strip single quotes.
     *
     * @param  string $expression
     * @return string
     */
    public static function stripQuotes($expression)
    {
        return str_replace("'", '', $expression);
    }
}
