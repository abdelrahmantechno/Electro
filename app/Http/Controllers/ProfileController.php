<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('backend.profile');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'current_password' => ['required_with:new_password', 'current_password'],
            'password' => ['nullable', 'required_with:current_password', 'string', 'min:8', 'confirmed']
        ]);

        /** @var User $admin */
        $admin = Auth::user();
        $admin->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        if ($request->hasFile('image')) {
            if ($admin->image) {
                File::delete(public_path('images/' . $admin->image->path));
                $admin->image()->delete();
            }
            $file = $request->file('image');
            $filename = rand() . "_" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/'), $filename);

            $admin->image()->create([
                'path' => $filename
            ]);
        }

        flash()->success('Profile updated successfully');
        return Redirect::route('profile.edit');
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
