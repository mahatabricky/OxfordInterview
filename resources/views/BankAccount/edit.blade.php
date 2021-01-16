@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bank Account Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('account.update',['id' =>$single->id]) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Account Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="account_name" value="{{ $single->account_name }}" autofocus>
                                @error('account_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="financial_organization_id" class="col-md-4 col-form-label text-md-right">{{ __('Bank') }}</label>
                            <div class="col-md-6">
                                <select name="financial_organization_id" id="pet-financial_organization_id" class="form-control">
                                <option value="{{ $single->financial_organization_id }}" selected>{{ $single->organization->name }}</option>
                                    @foreach ($banks as $item)                             
                                    <option value="{{ $item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('financial_organization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="account_no" class="col-md-4 col-form-label text-md-right">{{ __('Account No') }}</label>
                            <div class="col-md-6">
                                <input id="account_no" type="text" class="form-control" name="account_no" value="{{ $single->account_no }}" autofocus>
                                @error('account_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="branch" class="col-md-4 col-form-label text-md-right">{{ __('Branch') }}</label>
                            <div class="col-md-6">
                                <input id="branch" type="text" class="form-control" name="branch" value="{{ $single->branch }}" autofocus>
                                @error('branch')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_type" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>
                            <div class="col-md-6">
                                <input id="account_type" type="number" class="form-control" name="account_type" value="{{ $single->account_type }}" autofocus>
                                @error('account_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="swift_code" class="col-md-4 col-form-label text-md-right">{{ __('Swift Code') }}</label>
                            <div class="col-md-6">
                                <input id="swift_code" type="text" class="form-control" name="swift_code" value="{{ $single->swift_code }}" autofocus>
                                @error('swift_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="route_no" class="col-md-4 col-form-label text-md-right">{{ __('Route No') }}</label>
                            <div class="col-md-6">
                                <input id="route_no" type="text" class="form-control" name="route_no" value="{{ $single->route_no }}" autofocus>
                                @error('route_no')
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
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>                        
                </div>
        </div>
    </div>
    
</div>

@endsection
