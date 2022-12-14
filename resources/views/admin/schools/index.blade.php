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

                    <a href="/admin/schools/create" class="btn-sm btn btn-primary">Add New School</a>



                    <table class="table table-striped table-bordered mt-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schools as $school)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->created_at }}</td>
                            <td>
                                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{ route('schools.edit',$school->id) }}">Edit</a>
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
