@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>@yield('page',"Add user")</h5>
    </div>
    <div class="card-body">
                <form action="/admin/users" method="post" style="margin-left: 33%">
                    @csrf                    
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control w-50" placeholder="Name">
                        </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control w-50" id="exampleInputPassword1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control w-50">
                            <option>Select Role</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control w-50" placeholder="Password">
                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection