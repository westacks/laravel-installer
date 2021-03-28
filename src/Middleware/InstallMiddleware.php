<?php

namespace WeStacks\Laravel\Installer\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstallMiddleware
{
    protected $except = [
        'install',
        'install/*',
    ];

    public function handle(Request $request, Closure $next)
    {
        if (config('installer.app_configured') === false && !$this->inExceptArray($request) ) {
            return redirect()->route('install.start');
        }

        return $next($request);
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }
        return false;
    }
}
