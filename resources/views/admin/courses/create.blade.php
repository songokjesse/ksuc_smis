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
                <form action="{{route('courses.store')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">New Course</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Program</label>
                                <select name="program_id" class="form-control">
                                    <option selected disabled> Select Program </option>
                                    @foreach($programs as $program)
                                        <option value="{{$program->id}}">School of  {{$program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Course Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Unit Code</label>
                                <input type="text" class="form-control" name="course_code" id="exampleFormControlInput1" placeholder="Unit Code">
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

