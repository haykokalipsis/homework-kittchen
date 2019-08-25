<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.pages.profile.index', compact('user'));
    }

    public function updateData(Request $request)
    {
        $user = $request->user();

        $rules = array(
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ]
	    );

	    // Add image rule only if user uploaded new image. Можно так, а можно как выше
	    if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,bmp,png,gif';
	    }

        $validator = Validator::make($request->all(), $rules);

        if ($user) {

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $password = $request->input('password');

            if( ! Hash::check($password, Auth::user()->password) ) {
                return back()->with('warning', 'The specified password is not valid');
            } else {
                $user->updateData($request->except(['password', 'image']) );

                if ($request->hasFile('image'))
                    $user->updateImage($request->file('image') );

                return back()->with('success', 'Data has been updated');
            }

        }
    }

    public function updatePassword(Request $request)
    {
        $oldPassword = $request->input('old_password');
        $newPassword = $request->input('password');

        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        );

        if ($this->validate($request, $rules)) {
            if( ! Hash::check($oldPassword, Auth::user()->password) ) {
                return back()->with('error', 'Current password is not valid');
            } else {
                $request->user()->fill(['password' => Hash::make($newPassword)] )->save();
                return back()->with('success', 'Password has been updated');
            }
        }

    }
}
