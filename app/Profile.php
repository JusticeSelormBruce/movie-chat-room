<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'bio',
        'username',
        'dob',
        'gender_id',
        'country_id',
        'user_id'
    ];

    public function getAvatarPath()
    {
        $details = $this->validateAvatarDetails();
        $path = Storage::putFile('users/profile/' . '' . Auth::user()->name . '' . '/avatar', $details['avatar']);
        return $details['avatar']->storeAs("public", $path);
    }

    public function validateProfileDetails()
    {

        return request()->validate(
            [
                "first_name" => "required|string|max:30",
                "middle_name" => "",
                "last_name" => "required|string|max:30",
                "bio" => "required|string|max:2000",
                "username" => "required|string|max:50|unique:profiles",
                "dob" => "required|string",
                "gender_id" => "required|numeric",
                "country_id" => "required|numeric",
            ]
        );
    }
    public function validateUpdateProfileDetails()
    {

        return request()->validate(
            [
                "first_name" => "required|string|max:30",
                "middle_name" => "",
                "last_name" => "required|string|max:30",
                "bio" => "required|string|max:2000",
                "username" => "required|string|max:50",
                "dob" => "required|string",
                "gender_id" => "required|numeric",
                "country_id" => "required|numeric",
            ]
        );
    }

    public function validateAvatarDetails()
    {

        return request()->validate(
            [
                'avatar' => "required|file|max:2000|mimes:jpeg,png"
            ]
        );
    }

    public function updateAttachment($id, $path)
    {
        User::whereId($id)->update(['attachment' => $path]);
    }

    public function gender()
    {
        return $this->hasOne(Gender::class);
    }
    public function country()
    {
        return $this->hasOne(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
