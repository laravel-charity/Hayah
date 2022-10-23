@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>@yield('page',"Add user")</h5>
    </div>
    <div class="card-body">
                <form action="/admin/users/{{ $user->id }}" method="post" style="margin-left: 33%">
                    @csrf                    
                    @method("PUT")
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control w-50" placeholder="Name" value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control w-50" placeholder="Email" value="{{ $user->email }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control w-50">
                            <option>Select Role</option>
                            <option value="user" {{ $user->role == "user" ? "selected" : ""  }}>User</option>
                            <option value="admin" {{ $user->role == "admin" ? "selected" : ""  }}>Admin</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection