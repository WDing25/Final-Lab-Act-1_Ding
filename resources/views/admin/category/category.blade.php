<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
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
                            <th scope="col">Category Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                //implementing auto incremeting ID
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user_id}}</td>
                                    <td>{{$category->created_at}}</td>

                                    <td>
                                        <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('category/remove/'.$category->id)}}" class ="btn btn-danger">Trash</a>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$categories->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Categories
                        </div>
                    <div class="card-body">
                    <form action="{{route('add.category')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="form-control">Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
            
            {{-- for deleted items --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Deleted Items
                    </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Deleted At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($trashCat as $trash)
                            <tr>
                                <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                <td>{{$trash->category_name}}</td>
                                <td>{{$trash->user_id}}</td>
                                <td>{{$trash->deleted_at}}</td>
                                <td>
                                    <a href="{{url('category/restore/'.$trash->id)}}" class="btn btn-info">Restore</a>
                                    <a href="{{url('category/delete/'.$trash->id)}}" class ="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$trashCat->links()}}
                </div>
                </div>

        </div>
    </div>
</x-app-layout>
