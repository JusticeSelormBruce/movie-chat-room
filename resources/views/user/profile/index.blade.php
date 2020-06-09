        @extends('layouts.app')
        @section('content')
        <style>
            .avatar {
                width: 150px !important;
                height: 150px !important;
            }
            .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        }



        .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        }
        </style>
        <div class="container">
            <div class="alert alert-white">
                <div align="center">
                    <span>User Profile</span>
                </div>
            </div>
            @include('common.alert')
        <div class="row small no-gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <form action="">
                    <div class="row">
                <div class="mx-auto">
                <div>

                        <div class="mx-xl-auto mx-lg-auto mx-md-auto mx-sm-auto">
                            <img class="avatar rounded" id="blah"/>
                        </div>

                </div>
                <div class="col pt-2">

                        <div class="row">
                            <div class="mx-xl-auto mx-lg-auto mx-md-auto mx-sm-0">
                            <div class="upload-btn-wrapper">
                                <button class="btn btn-sm btn-secondary w-100"><span class="mx-3">update avatar</span></button>
                                <input type="file" name="avatar"   onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            </div>

                    </div>
                </div>
                </div>
            </div>
                </form>

            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">

        <div class="jumbotron bg-white py-0">
        <form action="{{route('profile.update')}}" class="ml-xl-5 ml-lg-5 ml-md-5 ml-sm-0">
            @csrf
            <div class="input-group-sm">
                <label for="first_name">First Name*</label>
                <input type="text" class="form-control" name="first_name" required value="{{ $user->first_name  ?? old('first_name') ?? ''}}">
                <div  class="text-danger">
                        {{$errors->first("first_name")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" name="middle_name"  value="{{ $user->middle_name ?? old('middle_name') ?? ''}}">
                <div class="text-danger">
                        {{$errors->first("middle_name")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="last_name">Last  Name*</label>
                <input type="text" class="form-control" name="last_name" reqired value="{{$user->last_name ?? old('last_name') ?? ''}}">
                <div  class="text-danger">
                        {{$errors->first("last_name")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="username">Username*</label>
                @if($user->username != null)
                <input type="text" class="form-control" name="username" reqired value="{{ $user->username}}" readonly>
                @else
                <input type="text" class="form-control" name="username" reqired value="{{ $user->username ?? old('username')  ?? ''}}">
                @endif
                <div  class="text-danger">
                        {{$errors->first("username")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="dob" >Date of Birth*</label>
                <input type="date" class="form-control" name="dob" reqired value="{{ $user->dob  ?? old('dob')?? ''}}">
                <div  class="text-danger">
                        {{$errors->first("dob")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="gender_id" >Gender*</label>
               <select name="gender_id"  class="form-control" required>
                     <option value="">-----------Select Gender-----------</option>
                     @foreach($gender as $sex)
                     <option value="{{$sex->id}}" @if($sex->id == $user->gender_id)  selected @endif>{{$sex->gender}}</option>
                     @endforeach
               </select>
                <div  class="text-danger">
                        {{$errors->first("gender_id")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="country_id" >Country*</label>
               <select name="country_id"  class="form-control" required >
                     <option value="">-----------Select Country-----------</option>
                     @foreach($countries as $item)
                     <option value="{{$item->id}}" @if( $item->id == $user->country_id) selected @endif>{{$item->name}} <span class="mx-2 font-italic">({{$item->nationality}})</span></option>
                     @endforeach
               </select>
                <div  class="text-danger">
                        {{$errors->first("country_id")}}
                 </div>
            </div>
            <div class="input-group-sm">
                <label for="bi" >Biography*</label>
            <textarea name="bio" cols="30" rows="5" class="form-control" required>
                {{$user->bio}}
            </textarea>
            <span class="small">max 200 words</span>
                <div  class="text-danger">
                         {{$errors->first("bio")}}
                 </div>
            </div>

            <div class="row">
                <div class="mx-auto">
                    <button class="btn btn-secondary btn-sm">
                        <span class="mx-3">Update</span>
                    </button>
                </div>
            </div>
        </form>
        </div>

            </div>

        </div>
        </div>
        @endsection
