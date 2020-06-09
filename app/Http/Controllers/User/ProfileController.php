<?php

namespace App\Http\Controllers\User;

use App\classes\DeleteFile;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user()->profile;
        return view('user.profile.index', compact('user'));
    }

    public function store()
    {
        $model = new Profile();
        $userDetails = $model->validateProfileDetails() + ['user_id' => Auth::id()];
        Profile::create($userDetails);
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profile.show', compact('user'));
    }

    public function update()
    {
        $model = new Profile();
        $userDetails = $model->validateUpdateProfileDetails()  + ['user_id' => Auth::id()];
        Profile::where('user_id', Auth::id())->update($userDetails);
    }


    public function profileExist()
    {
        $result = Profile::where('user_id', Auth::id())->first();
        if ($result != null) {
            $this->update();
            return redirect('profile')->with('msg', 'Profile Updated Successfully');
        } else {

            $this->store();
            return redirect('profile')->with('msg', 'Profile Updated Successfully');
        }
    }
    public function updateAvatar()
    {

        $model = new Profile();
        $path = $model->getAvatarPath();
        $this->deletefile();
        User::whereId(Auth::id())->update(['avatar' => $path]);
        return back()->with('msg', 'Avatar Updated Successfully');
    }

    public function deletefile()
    {
        $delFile = new DeleteFile();
        $delFile->removeFile('User', Auth::id(), 'avatar');
    }

    public function removeAvatar()
    {
           User::whereId(Auth::id())->update(['avatar'=>""]);
           return back()->with('msg', 'Avatar removed Successfully');
    }
}
