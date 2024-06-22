@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div>
                <h2>No of Products:{{$productCount}}</h2>
                <h2>No of Media:{{$mediaCount}}</h2>
                <h2>No of Product Views:</h2>
                <h2>No of Downloads:</h2>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}: Product Page
                    <a href="{{ url('/products')}}" class="btn btn-primary">Create New</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="badge bg-success text-center">
                        <h2 class="text-white">{{ session('status') }}</h2>
                    </div>
                    @endif
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->title}}</td>
                                <td>{{$dt->category}}</td>
                                <td>
                                    <a href="{{route('productsDestroy', ['product' => $dt->id])}}" class="text-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a href="{{route('products.show', ['product' => $dt->id])}}" class="text-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
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