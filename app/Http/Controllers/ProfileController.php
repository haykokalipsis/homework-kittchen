<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('front.pages.user.profile');
    }

    public function userNameSave(Request $request)
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        Auth::user()->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname')
        ]);

        return redirect()
            ->back()
            ->withSuccess('Users name and surname updated');
    }

    public function userTypeSave(Request $request)
    {
        $rules = [
            'type' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        Auth::user()->update([
            'type' => $request->input('type')
        ]);

        return redirect()
            ->back()
            ->withSuccess('Users Type updated');
    }

    public function userTelSave(Request $request)
    {
        $rules = [
            'tel' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        auth()->user()->update([
            'tel' => $request->input('tel')
        ]);

        return redirect()
            ->back()
            ->withSuccess('Users Phone number updated');
    }

    public function userEmailSave(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id)
            ]
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        Auth::user()->update([
            'email' => $request->input('email'),
        ]);

        return redirect()
            ->back()
            ->withSuccess('Users Email address updated');
    }

    public function userImageSave(Request $request)
    {
        $rules = [
            'photo_name' => 'required|image|mimes:jpeg,jpg,bmp,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        auth()->user()->updateImage($request->file('photo_name'));

        return redirect()
            ->back()
            ->withSuccess('Users Photo has been updated');
    }
}
