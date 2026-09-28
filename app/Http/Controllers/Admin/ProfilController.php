<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('admin.profil.index', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'foto'          => ['nullable', 'image', 'max:5120'],
            'password_lama' => ['nullable', 'required_with:password_baru', 'current_password'],
            'password_baru' => ['nullable', 'required_with:password_lama', 'confirmed', Password::min(8)],
        ], [
            'password_lama.current_password' => 'Kata sandi lama yang kamu masukkan salah.',
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $user->foto = $request->file('foto')->store('profil', 'public');
        }

        if (!empty($validated['password_baru'])) {
            $user->password = Hash::make($validated['password_baru']);
        }

        $user->save();

        return redirect()->route('admin.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function hapusFoto(): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
            $user->foto = null;
            $user->save();
        }

        return redirect()->route('admin.profil.index')->with('success', 'Foto profil berhasil dihapus.');
    }
}