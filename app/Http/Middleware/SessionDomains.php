<?php

namespace App\Http\Middleware;

use Closure;

class SessionDomains
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $host    = $request->getHost();
        $domains = explode(';', config('site.domains'));

        foreach ($domains as $domain) {
            if ($domain && strpos($host, $domain) !== false) {
                config([
                    'session.domain' => ($host === 'localhost' ? '' : '.') . $domain,
                ]);
                break;
            }
        }
        
        return $next($request);
    }
}