@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Test list') }}</div>

                <div class="card-body">
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
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $index =0; ?>
                            @foreach ($tests as $test)
                            <tr>
                                <th scope="row">{{ $test->test_id }}</th>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->user->name }}</td>
                            {{-- <td>{{ $index+1 }}</td> --}}
                                
                            <td><a href="{{ route('tests.edit',['id'=> $test->test_id]) }}">Edit</a>||<a href="{{ route('tests.destroy',['id'=> $test->test_id]) }}">Delete</a></td>
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
