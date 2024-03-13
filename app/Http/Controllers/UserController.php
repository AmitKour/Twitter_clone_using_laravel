<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{




    public function show(User $user)
    {
        $ideas= $user->ideas()->paginate(5);
        return view('users.show',compact('user','ideas'));

    }


    public function edit(User $user)
    {
        $this->authorize('update',$user);
        $editing =true;
        $ideas= $user->ideas()->paginate(5);
        return view('users.edit',compact('user','editing','ideas'));
    }


    public function update(UpdateUserRequest $request, User $user)
{
    $this->authorize('update',$user);
    $validated = $request->validated();
      //rules for validation in UpdateUserRequest


    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profile', 'public');
        $validated['image'] = $imagePath;

        if ($user->image && is_string($user->image)) {
            // Check if the user has a non-null image path before attempting to delete it
            Storage::disk('public')->delete($user->image ?? '');
        }
    }

    $user->update($validated);

    return redirect()->route('profile');
}


    public function profile(){
        return $this->show(auth()->user());
    }

}
