<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    // Methods
    public function update($id, Request $request, User $users) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'town' => 'required',
            'postcode' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'role' => 'required',
        ]);

        $user = $users->find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->town = $request->town;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->contactperson = $request->contactperson;
        $user->contactpersonphone = $request->contactpersonphone;
        $user->role = $request->role;

        if (!empty($request->password) && !empty($request->confirm_password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect::back()->with('success', $user->name.' have been successfully updated.');
    }

    public function destroy($id, User $users) {
        $user = $users->find($id);
        $user->delete();

        return redirect::back()->with('success', $user->name.' have been successfully deleted.');
    }
}
