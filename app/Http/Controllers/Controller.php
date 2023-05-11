<?php

namespace App\Http\Controllers;

use Auth;
use Route;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        view()->share('isLoggedIn', Auth::check());
        if (Auth::check())
        {
            view()->share('currentUser', Auth::user());
        }
        else
        {
            view()->share('currentUser', null);
        }

        $baseRoute = '';
        $currentRoute = Route::getCurrentRoute();
        if ( ! is_null($currentRoute))
        {
            if ($currentRoute->getUri() == '' OR $currentRoute->getUri() == '/')
            {
                $baseRoute = 'home';
            }
            else if (stristr($currentRoute->getName(), '.') !== FALSE)
            {
                $parts = explode('.', $currentRoute->getName());
                $baseRoute = reset($parts);
            }
        }

        view()->share('currentRoute', $baseRoute);
    }
}
