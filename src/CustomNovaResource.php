<?php

namespace Cyrus\Nova;

use \Laravel\Nova\Http\Requests\NovaRequest;
use \Laravel\Nova\Resource;
use \Laravel\Nova\Fields\Field;

abstract class CustomNovaResource extends \App\Nova\Resource
{
    public static string $tableStyle = 'tight';
    public static string $group = 'Livestock';
    public static array $perPageOptions = [15, 25, 50, 100, 250, 500];
    public static float $debounce = 1.5; // 0.5 seconds

    /**
     * The array of booted resources.
     *
     * @var array
     */
    protected static $booted = [];

    /**
     * Check if the model needs to be booted and if so, do it.
     *
     * @return void
     */
    protected function bootIfNotBooted()
    {
        if (! isset(static::$booted[static::class])) {
            static::$booted[static::class] = true;

            static::booting();
            static::boot();
            static::booted();

        }
    }

    /**
     * Perform any actions required before the model boots.
     *
     * @return void
     */
    protected static function booting()
    {
        Field::macro('minColumnWidth', function($width = 20) {
            return $this->withMeta(['minColumnWidth' => $width]);
        });
        Field::macro('maxColumnWidth', function($width = 280) {
            return $this->withMeta(['maxColumnWidth' => $width]);
        });
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        //
    }

    protected static function boot()
    {
        //
    }

    /**
     * Return the location to redirect the user after creation.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
        // return '/resources/'.static::uriKey().'/'.$resource->getKey();
    }

    /**
     * Return the location to redirect the user after update.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
        // return '/resources/'.static::uriKey().'/'.$resource->getKey();
    }

    /**
     * Return the location to redirect the user after deletion.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return string|null
     */
    public static function redirectAfterDelete(NovaRequest $request)
    {
        return null;
    }

    public function __construct(...$args) {
        $this->bootIfNotBooted();
        return parent::__construct(...$args);
    }
}
