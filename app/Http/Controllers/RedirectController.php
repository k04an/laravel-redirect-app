<?php

namespace App\Http\Controllers;

use App\Models\RedirectRoute;
use App\Models\RouteLogEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function redirect(Request $request) {
        if (RedirectRoute::select('*')->where('fromUrl', $request->redirectRoute)->get(1)->count() == 0) {
            return abort(404);
        } else {
            if (RedirectRoute::where('fromUrl', $request->redirectRoute)->first()->trackable) {
                RouteLogEntry::create([
                    'ip_address' => $request->ip(),
                    'redirect_route_id' => RedirectRoute::where('fromUrl', $request->redirectRoute)->first()->id
                ]);
            }
            return Redirect::to(RedirectRoute::where('fromUrl', $request->redirectRoute)->first()->toUrl);
        }
    }
}
