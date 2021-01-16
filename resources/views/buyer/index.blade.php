@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buyers Board') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buyer.store') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Buyer Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Buyer Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                       <div class="form-group row">
                        <div class="col-md-6">
                            @if(Session::has('success'))
                                <p class="alert alert-success">{{ Session::get('success') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(Session::has('danger'))
                                <p class="alert alert-danger">{{ Session::get('danger') }}</p>
                            @endif
                        </div>

                        <div class="col-md-6">
                            @if(Session::has('danger-del'))
                                <p class="alert alert-danger">{{ Session::get('danger-del') }}</p>
                            @endif
                        </div>
                       </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>                        
                </div>
        </div>
    </div>
    
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buyers list') }}</div>

                <div class="card-body">
                   
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($buyers as $buyer)
                            <tr>
                                <th scope="row">{{ $buyer->id }}</th>
                                <td>{{ $buyer->name }}</td>
                                <td>{{ $buyer->description }}</td>
                                <td>{{ $buyer->user->name }}</td>
                                {{-- <td><a href="/single/ {{ $buyer->id }}">Edit</a><a href="">Delete</a></td> --}}
                            <td><a href="{{ route('buyer.edit',['id'=> $buyer->id]) }}">Edit</a>||<a href="{{ route('buyer.destroy',['id'=> $buyer->id]) }}">Delete</a></td>
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
