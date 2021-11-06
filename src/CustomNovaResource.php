<?php

namespace Cyrus\CustomNovaResource;

use Illuminate\Http\Request;

class CustomNovaResource extends \App\Nova\Resource
{
    public static string $tableStyle = 'tight';
    public static string $group = 'Livestock';
    public static array $perPageOptions = [15, 25, 50, 100, 250, 500];
    public static float $debounce = 1.5; // 0.5 seconds
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
}
