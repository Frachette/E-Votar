<?php

namespace App\Http\Middleware;

use App\Models\IpRecord;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBlockedIp
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $userId = Auth::id();

        $ipRecord = IpRecord::where('user_id', $userId)
            ->where('status', 'blocked')
            ->first();

        if ($ipRecord && Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('voter.login')->with('error', 'You are currently blocked on this IP. Please contact comelec technical support .');
        }

        return $next($request);
    }
}
