@extends('layouts.admin_dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="/admin/courses/create" class="btn-sm btn btn-primary">Add New Course</a>

                <table class="table table-striped table-bordered mt-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Program</th>
                        <th>Unit Code</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>School of {{ $course->program->name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->name }}</td>
                            <td>
                                <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

