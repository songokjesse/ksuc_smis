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

                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">Add User</div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                <input type="text" class="form-control"  name="first_name" id="exampleFormControlInput1" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Surname</label>
                                <input type="text" class="form-control"  name="surname" id="exampleFormControlInput1" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control"  name="email" id="exampleFormControlInput1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                <input type="text" class="form-control"  name="phone" id="exampleFormControlInput1" placeholder="Phone">
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

