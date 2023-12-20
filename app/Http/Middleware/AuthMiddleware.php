<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //إنشاء Middleware للتحقق من أن المستخدم مسجل الدخول قبل السماح له بالوصول إلى مسار معين.
        
        if (!auth()->check()) {
            return redirect('login');
        }
    
        return $next($request);
    }
}
