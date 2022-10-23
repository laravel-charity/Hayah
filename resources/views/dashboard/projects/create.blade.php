@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>@yield('page',"Add user")</h5>
    </div>
    <div class="card-body">
                <form action="/admin/projects" method="post" style="margin-left: 33%" enctype="multipart/form-data">
                    @csrf       
                    
                                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control w-50" id="exampleInputPassword1" placeholder="Name">
                   @error('name')
                   <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror 
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="" class="form-control w-50" placeholder="Description" cols="30" rows="10"></textarea>
                        @error('description')
                        <small class="text-danger">
                         {{ $message }}
                     </small>
                     @enderror 
                    </div>
                
                    {{-- <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control w-50">
                    @error('image')
                    <small class="text-danger">
                     {{ $message }}
                    </small>
                    @enderror 
                </div> --}}

                    <div class="form-group">
                        <label>Target Donation</label>
                        <input type="text" name="target_donations" class="form-control w-50" id="exampleInputPassword1" placeholder="Target Donation">
                        @error('target_donation')
                        <small class="text-danger">
                         {{ $message }}
                     </small>
                     @enderror 
                    </div>
                    <div class="form-group">
                        <label>Starting Date</label>
                        <input type="date" name="starting_date" class="form-control w-50" id="exampleInputPassword1">
                        @error('starting_date')
                        <small class="text-danger">
                         {{ $message }}
                     </small>
                     @enderror 
                    
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control w-50" id="exampleInputPassword1" placeholder="Status">
                        @error('status')
                        <small class="text-danger">
                         {{ $message }}
                     </small>
                     @enderror 
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control w-50">
                            {{-- <option>Select category</option> --}}
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">
                         {{ $message }}
                     </small>
                     @enderror 
                    </div>
                    
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
</div>
@endsection