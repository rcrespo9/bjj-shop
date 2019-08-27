<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            function removeUnderscores($str) {
                return str_replace('_', ' ', $str);
            }

            $user = Auth::user();
            $permissions = json_decode(json_encode($user->getPermissionsViaRoles()), true);
            $permission_names = array_map(function($perm) {
                return $perm['name'];
            }, $permissions);
            $formatted_perms = array_map(function($perm_name) {
                return str_replace('_', ' ', $perm_name);
            }, $permission_names);
        }
        
        return view('home', compact('formatted_perms'));
    }
}
