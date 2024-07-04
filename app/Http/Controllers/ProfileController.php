<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Ambil data user yang sedang login
        $user = $request->user();

        return view('profile.edit', ['user' => $user]);

    }

    /**
     * Update the user's profile information.
     */
   /**
 * Update the user's profile information.
 */
public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();
    $data = $request->validated();

    // Update name and email
    $user->fill([
        'name' => $data['name'],
        'email' => $data['email'],
    ]);

    // Handle profile photo upload
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto) {
            Storage::delete('public/akun/' . $user->foto);
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/akun', $fileName); // Simpan di storage public/akun
        $user->foto = $fileName; // Simpan nama file foto ke dalam field 'foto' di tabel user
    }

    // Reset email verification if email has changed
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
