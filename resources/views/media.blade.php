@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}: Media Page
                    <a href="{{ url('/media_uploads')}}" class="btn btn-primary">Create New</a>
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
                                <th>Media</th>
                                <th>Name</th>
                                <th>category</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{$dt->media_upload}}"></a></td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->category}}</td>
                                <td>{{$dt->description}}</td>
                                <td>
                                    <a href="{{route('mediasDestroy', ['media' => $dt->id])}}" class="text-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a href="{{route('media_uploads.show', ['media_upload' => $dt->id])}}" class="text-primary">
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