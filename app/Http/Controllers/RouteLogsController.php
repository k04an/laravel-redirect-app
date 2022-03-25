<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RedirectRoute;
use Illuminate\Support\Facades\Auth;

class RouteLogsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if (RedirectRoute::select('*')->where('fromUrl', $request->redirectRoute)->get(1)->count() == 0) return redirect(route('dashboard'));

        if (RedirectRoute::select('user_id')->where('fromUrl', $request->redirectRoute)->get(1)[0]->user_id != Auth::user()->id) return redirect(route('dashboard'));

        return view('logs', [
            'logs' => \App\Models\RedirectRoute::where('fromUrl', $request->redirectRoute)->first()->logEntries
        ]);
    }
}
