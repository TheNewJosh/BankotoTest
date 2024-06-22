@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Product Update Page</div>

                <div class="card-body">

                    <form action="{{route('productUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (session('status'))
                        <div class="badge bg-success text-center">
                            <h2 class="text-white">{{ session('status') }}</h2>
                        </div>
                        @endif
                        <input type="hidden" name="id" value="{{$data->id}}" />
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product name</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product title</label>
                            <input type="text" name="title" value="{{$data->title}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Category</label>
                            <input type="text" name="category" value="{{$data->category}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Tag</label>
                            <input type="text" name="tag" value="{{$data->tag}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Size</label>
                            <input type="text" name="size" value="{{$data->size}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Weight</label>
                            <input type="text" name="weight" value="{{$data->weight}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Sku id</label>
                            <input type="text" name="sku_id" value="{{$data->sku_id}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product colour</label>
                            <input type="text" name="colour" value="{{$data->colour}}" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description</label>
                            <textarea name="description" id="" class="form-control">{{$data->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection