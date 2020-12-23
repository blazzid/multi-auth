<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LastOnlineAt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach(array_keys(config('auth.guards')) as $guard) {

            $user = Auth::guard($guard)->user();

            if ($user) {
                $this->updateLastActivityField($user);
            }
        }

        return $next($request);
    }

    private function updateLastActivityField(Model $user)
    {
        $lastActivityField = 'last_online_at';

        $this->hideFromEvents($user, function() use ($user, $lastActivityField) {
            $user->$lastActivityField = now();
            $user->save();
        });
    }

    private function hideFromEvents(Model $model, callable $callback)
    {
        $dispatcher = $model::getEventDispatcher();
        $model::unsetEventDispatcher();

        $result = $callback();

        $model::setEventDispatcher($dispatcher);

        return $result;
    }
}
