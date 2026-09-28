<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    public function tandaiBaca(Request $request, string $id): RedirectResponse
    {
        $notifikasi = Auth::user()->notifications()->where('id', $id)->first();

        $notifikasi?->markAsRead();

        if ($request->filled('redirect')) {
            return redirect($request->input('redirect'));
        }

        return back();
    }

    public function tandaiSemuaBaca(): RedirectResponse
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}