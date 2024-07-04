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
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
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

    // Handle file upload if a new photo is provided
    if ($request->hasFile('foto')) {
        // Validate the uploaded file
        $request->validate([
            'foto' => ['image'], // example validation rules
        ]);

        // Delete the old photo if exists
        if ($user->foto) {
            Storage::delete('public/akun/' . $user->foto);
        }

        // Store the uploaded file with hashed filename
        $fotoPath = $request->file('foto')->storeAs('public/akun', $request->file('foto')->hashName());
        $data['foto'] = basename($fotoPath); // store the hashed filename only
    }

    // Update user's data
    $user->fill($data);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return redirect()->route('profile.edit')->with('status', 'profile-updated');
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
