@extends('layouts.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('programs.update', $program->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">Edit Program</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">School</label>

                                    <select name="school_id" class="form-control">
                                        <option selected disabled> Select School </option>
                                        @foreach($schools as $school)
                                            <option value="{{$school->id}}">School of  {{$school->name}}</option>
                                        @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Program Name</label>
                                <input type="text" class="form-control"  value="{{$program->name}}" name="name" id="exampleFormControlInput1" placeholder="Program Name">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

