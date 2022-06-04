<?php


namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission, $guard = null)
    {
//        return $next($request);

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        $admin = \Auth::guard('admins')->user();

        foreach ($permissions as $permission) {
            if($admin->can($permission)) return $next($request);
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
