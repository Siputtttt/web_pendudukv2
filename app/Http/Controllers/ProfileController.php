<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\roleModel;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile2.index', [
            'user' => $request->user(),
        ]);
    }
    public function editUser(String $email)
    {
        // $data = pendudukModels::where('nik', $id)->first();
        $data = User::where('email', $email)->first();
        $role = roleModel::get();
        $title = 'user';
        return view('admin.auth2.edit', compact('data', 'title'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect('/profile')->with('status', 'profile-updated');
    }

    public function updateUser(Request $request)
    {
        $email = $request->email;

        $input = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ];

        User::where('email', $email)->update($input);

        return back()->with('pesan', 'password-updated');
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
    public function hapusUser(String $email)
    {
        User::where('email', $email)->delete();
        return redirect('/user')->with('pesan', "Data Berhasil Dihapus");
    }
}
