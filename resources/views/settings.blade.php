@extends('layouts.master')

@section('content')
	<div class="row">
        <div class="col-lg-4">

            <div class="card">
                <h5 class="card-header bg-primary text-white">
                    User info
                </h5>

                <div class="card-body">

                    <form method="post" action="{{ route('settings.userinfo') }}">

                        @csrf

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{Auth::user()->firstname}}"/>
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{Auth::user()->lastname}}"/>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header bg-primary text-white">
                    Password
                </h5>

                <div class="card-body">

                    <form method="post" action="{{route('settings.password')}}">

                        @csrf

                        <div class="form-group">
                            <label for="password_old">Old password</label>
                            <input type="password" class="form-control @error('password_old') is-invalid @enderror" id="password_old" name="password_old"/>
                            @error('password_old')
                            <span class="text-danger">Incorrect password</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"/>
                            @error('password')
                            <span class="text-danger">
                                <ul>
                                    <li>Must be at least 6 characters long</li>
                                    <li>Must contain at least 1 special character (e.g. ! # " )</li>
                                    <li>Must contain at least 1 number</li>
                                    <li>Can not be the same as current password</li>
                                </ul>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">Confirm new password</label>
                            <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" id="password_confirm" name="password_confirm"/>
                            @error('password_confirm')
                            <span class="text-danger">
                                Must be identical to password
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">

        <div class="col-lg-4">

            <div class="card">
                <h5 class="card-header bg-primary text-white">
                    Time registering settings
                </h5>

                <div class="card-body">
                    <form method="post" action="{{route('settings.timesettings')}}">

                        @csrf

                        <div class="form-group">
                            <label for="hoursBeforeSubtract">Hours before subtracting break time <sub>(Default 3)</sub></label>
                            <input type="number" step="any" class="form-control @error('hoursBeforeSubtract') is-invalid @enderror" name="hoursBeforeSubtract" id="hoursBeforeSubtract" value="{{Auth::user()->settings->hoursBeforeSubtract}}"/>
                        </div>

                        <div class="form-group">
                            <label for="hoursAmountToSubtract">How many hours to subtract for break <sub>(Default 0.5)</sub></label>
                            <input type="number" step="any" class="form-control @error('hoursAmountToSubtract') is-invalid @enderror" name="hoursAmountToSubtract" id="hoursAmountToSubtract" value="{{Auth::user()->settings->hoursToSubtract}}"/>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
