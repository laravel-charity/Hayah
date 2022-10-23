@extends('layouts.master-admin')


@section('content')
    
<div class="card">
    <div class="card-header">
        <h5>@yield('page',"Add user")</h5>
    </div>
    <div class="card-body">
        <form action="/admin/projects/{{$project->id}}" method="post" style="margin-left: 33%" enctype="multipart/form-data">
            @csrf       
            @method('PUT')
                            
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control w-50" value="{{$project->name}}" placeholder="Name">
           @error('name')
           <small class="text-danger">
            {{ $message }}
        </small>
        @enderror 
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"  class="form-control w-50" placeholder="Description" cols="30" rows="10"> {{$project->description}}</textarea>
                @error('description')
                <small class="text-danger">
                 {{ $message }}
             </small>
             @enderror 
            </div>
        
            <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control w-50">
            <img src="{{$project->image}}" alt="image">
            @error('image')
            <small class="text-danger">
             {{ $message }}
         </small>
         @enderror 
        </div>

            <div class="form-group">
                <label>Target Donation</label>
                <input type="text" name="target_donations" value="{{$project->target_donations}}" class="form-control w-50" id="exampleInputPassword1" placeholder="Target Donation">
                @error('target_donation')
                <small class="text-danger">
                 {{ $message }}
             </small>
             @enderror 
            </div>
            <div class="form-group">
                <label>Starting Date</label>
                <input type="date" name="starting_date" class="form-control w-50" value="{{$project->starting_date}}" id="exampleInputPassword1">
                @error('starting_date')
                <small class="text-danger">
                 {{ $message }}
             </small>
             @enderror 
            
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control w-50" value="{{$project->status}}" id="exampleInputPassword1" placeholder="Status">
                @error('status')
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