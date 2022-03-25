<?php

namespace App\Http\Controllers;

use App\Models\RedirectRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RedirectRouteController extends Controller
{
    public function create(Request $request) {

        $request->validate([
           'url' => 'url'
        ]);

        $fromUrl = '';
        if (Auth::check() and Auth::user()->hasVerifiedEmail() and $request->input('customUrl') !== null) {
            if (RedirectRoute::where('fromUrl', $request->input('customUrl'))->count() == 0) {
                $fromUrl = $request->input('customUrl');
            } else {
                return back()->withErrors(['customUrl' => 'Имя маршрута уже занято']);
            }
        } else {
            while (true) {
                $fromUrl = Str::random(8);
                if (RedirectRoute::select('*')->where('fromUrl', )->get(1)->count() == 0) {
                    break;
                }
            }
        }

        if (Auth::check()) {
            $trackable = true;
            $userId = Auth::id();
        } else {
            $trackable = false;
            $userId = null;
        }

        $route = RedirectRoute::create([
            'fromUrl' => $fromUrl,
            'toUrl' => $request->input('url'),
            'user_id' => $userId,
            'trackable' => $trackable
        ]);

        return back()
            ->with('message', 'Перенаправление успешно создано!')
            ->with('url', $route->fromUrl);
    }
}
