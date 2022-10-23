@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>@yield('page',"Add user")</h5>
    </div>
    <div class="card-body">
                <form action="/admin/categories/{{ $category->id }}" method="post" style="margin-left: 33%">
                    @csrf                    
                    @method("PUT")
                        <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control w-50" placeholder="Name" value="{{ $category->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection