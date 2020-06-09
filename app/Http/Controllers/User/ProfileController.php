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
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    public function store()
    {
        $model = new Profile();
        $userDetails = $model->validateProfileDetails();
        Profile::create($userDetails);
        return back()->with('msg', 'Profile Updated Successfully');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('user.profile.show', compact('user'));
    }

    public function update()
    {
        $model = new Profile();
        $userDetails = $model->validateProfileDetails();
        Profile::where('user_id', Auth::id())->update($userDetails);
        return back()->with('msg', 'Profile Updated Successfully');
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
}
