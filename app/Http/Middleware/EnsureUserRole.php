<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserRole
{
    //dashboard, categories, products

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();

            // echo 'UserRole : ' . $userRole.'</br>';
            // echo 'CurentRouteName : ' . $currentRouteName.'</br>';

            if (in_array($currentRouteName, $this->userAccessRole()[$userRole])) {
                return $next($request);
            } else {
                abort(403, 'Unauthorized');
            }
        } catch (\Throwable $th) {
            abort(403, 'Unauthorized');;
        }

        // echo 'the middleware for access role runs everytime.</br>';



    }

    private function userAccessRole(){
        return [
            'user' => [
                'home',
                'dashboard',
                'cart',
            ],
            'admin' => [
                'home',
                'dashboard',
                'cart',
                'categories',
                'products',
                'productstransactions',
            ],
        ];
    }
}
