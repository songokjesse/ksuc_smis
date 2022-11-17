@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-3">
                <img src="{{asset('logo.png')}}" width="300" height="150" class="rounded">
            </div>
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" x-data="{role_id: 3}">
                        @csrf

                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Register As:') }}</label>

                            <div class="col-md-6">
                                <select name="role_id" x-model="role_id" class="form-control" required>
                                    <option value="3">Student</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div  x-show="role_id == 3">
                            <div class="row mb-3">
                                <label for="student_registation" class="col-md-4 col-form-label text-md-end">{{ __('Admission Number :') }}</label>
                                <div class="col-md-6">
                                    <input id="student_registation" type="text" class="form-control" name="admission_number" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="student_registation" class="col-md-4 col-form-label text-md-end">{{ __('Year of Admission :') }}</label>
                                <div class="col-md-6">
                                    <input id="student_registation" type="text" class="form-control" name="year_admitted" >
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3" x-show="role_id == 2">
                            <label for="staff_pf" class="col-md-4 col-form-label text-md-end">{{ __('Staff PF:') }}</label>

                            <div class="col-md-6">
                                <input id="staff_pf" type="text" class="form-control" name="pf" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
