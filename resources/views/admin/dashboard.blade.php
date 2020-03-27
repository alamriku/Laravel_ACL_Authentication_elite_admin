@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="wrap" style="display:flex">
                    <div class="col-2">
                        <a class="btn btn-success" href="{{route('get-author')}}">Auther</a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-success" href="{{route('get-admin')}}">Admin</a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-success" href="{{route('get-user')}}">User</a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-success" href="{{route('get-visitor')}}">Visitor</a>
                    </div>
                </div>


                    <div class="card-body">
                        <h4 class="card-title">Basic Table</h4>
                        <h6 class="card-subtitle">Add class <code>.table</code></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>

                                    <th>First Name</th>
                                    <th>email</th>
                                    <th>Visitor</th>
                                    <th>Admin</th>
                                    <th>Author</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <form action="{{route('update-role')}}" method="post">
                                            @csrf
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}<input type="hidden" name="email" value="{{$user->email}}" /></td>
                                            <td>
                                                <input type="checkbox" name="role_visitor" {{$user->hasRole('Visitor') == 'Visitor' ?'checked':''}}>


                                            </td>
                                            <td>
                                                <input type="checkbox" name="role_admin" {{$user->hasRole('Admin') == 'Admin' ?'checked':''}}>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="role_author" {{$user->hasRole('Author') == 'Author' ?'checked':''}}>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="role_user" {{$user->hasRole('User') == 'User' ?'checked':''}}>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-danger" >Assign</button>
                                            </td>
                                        </form>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>


            </div>
        </div>

    </div>

@endsection