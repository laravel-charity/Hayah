@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>Add Category</h5>
    </div>
    <div class="card-body">
                <form action="/admin/categories" method="post" style="margin-left: 33%">
                    @csrf                    
                        <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control w-50" placeholder="Name">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection