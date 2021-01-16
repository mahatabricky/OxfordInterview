@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Bank Accounts') }}</div>
                <div class="card-header float-right">
                <a href="{{ route('account.create') }}">create Account</a>
                </div>

                <div class="card-body">
                    <div class="col-md-8">
                        @if(Session::has('danger-del'))
                            <p class="alert alert-danger">{{ Session::get('danger-del') }}</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        @if(Session::has('success-del'))
                            <p class="alert alert-danger">{{ Session::get('success-del') }}</p>
                        @endif
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Account No</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $index =0; ?>
                            @foreach ($allAccounts as $account)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $account->account_name }}</td>
                                <th>{{ $account->organization->name }}</th>
                                <td>{{ $account->account_no }}</td>
                                <td>{{ $account->branch }}</td>
                                @if($account->account_type == 1)
                                  <td>Saving Account</td>
                                @elseif($account->account_type == 2) 
                                    <td>Current Account</td>
                                @elseif($account->account_type == 3) 
                                    <td>Join Account</td>
                                @else      
                                    <td>Other Account</td>
                                @endif

                                                                             
                            <td><a href="{{ route('account.edit',['id'=> $account->id]) }}">Edit</a>||<a href="{{ route('account.destroy',['id'=> $account->id]) }}">Delete</a></td>
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
