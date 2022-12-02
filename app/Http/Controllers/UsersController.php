<?php

namespace App\Http\Controllers;

use App\Models\TeachersModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

        if ($request->role == 'Teacher') {
            $teacher = new TeachersModel();

            $teacher->user = $user->id;
            $teacher->dance_style = $request->dance_style;
            $teacher->description = $request->short_description;
            $teacher->save();
        }
        else {
            $teacher = TeachersModel::where('user', $user->id);
            $teacher->delete();
        }

        if (!empty($request->password) && !empty($request->confirm_password)) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        if ($request->role == 'Admin') {
            return redirect::route('edit-user', $user->id)->with('success', $user->name.' have been successfully updated.');
        }
        elseif ($request->role == 'Teacher') {
            return redirect::route('edit-teacher', $user->id)->with('success', $user->name.' have been successfully updated.');
        }
        elseif ($request->role == 'Student') {
            return redirect::route('edit-student', $user->id)->with('success', $user->name.' have been successfully updated.');
        }
    }

    public function destroy($id, User $users) {
        $user = $users->find($id);
        $user->delete();

        return redirect::back()->with('success', $user->name.' have been successfully deleted.');
    }
}
