@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tests Board') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tests.store') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Test Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
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
                        <div class="col-md-6">
                            @if(Session::has('success-del'))
                                <p class="alert alert-danger">{{ Session::get('success-del') }}</p>
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

@endsection
