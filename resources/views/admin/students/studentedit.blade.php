@extends('layouts.admin_dashboard')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12"> 
       
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edit students') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="/admin/student/{{$student->id}}">
                                @csrf
        @method('PUT')
                                
                                <div class="row mb-3">
                                    <label for="adm" class="col-md-4 col-form-label text-md-end">{{ __('Admission number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="adm" type="text" class="form-control @error('adm') is-invalid @enderror" name="adm" value="{{ old('adm') }}" required autocomplete="firstname" autofocus>
        
                                        @error('adm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year admitted') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year" autofocus>
        
                                        @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
        
                              
        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Edit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
           
    </div>
</div>
@endsection