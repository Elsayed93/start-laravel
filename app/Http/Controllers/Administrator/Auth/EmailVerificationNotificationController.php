<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user('administrator')->hasVerifiedEmail()) {
            return redirect()->intended(route('administrator.dashboard'));
        }

        $request->user('administrator')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
