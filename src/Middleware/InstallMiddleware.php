<?php

namespace WeStacks\Laravel\Installer\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstallMiddleware
{
    protected $except = [
        'install',
        'install/requirements',
        'install/permissions',
    ];

    public function handle(Request $request, Closure $next)
    {
        if (config('installer.app_configured') === false && !in_array($request->path(), $this->except) ) {
            abort(404);
        }

        return $next($request);
    }
}
