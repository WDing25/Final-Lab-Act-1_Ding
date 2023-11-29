<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" alt="" style="width:70px;height:40px;"></td>
                                    <td>{{$brand->created_at->diffForHumans()}}</td>

                                    <td>
                                        <a href="" class="btn btn-info">Update</a>
                                        <a href="" class ="btn btn-danger">Delete</a>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$brands->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Brands
                        </div>
                    <div class="card-body">
                    <form action="{{route('add.brand')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name" class="form-control">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name">
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="brand_image" class="form-control">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image">
                            @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
