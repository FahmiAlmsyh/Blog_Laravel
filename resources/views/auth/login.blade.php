@extends('layouts.app')

@section('title', 'Login')



@section('content')

<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card ">
            <div class="card-header text-center fw-bold">
              Login
            </div>
            <div class="card-body ">
                <form method="POST" action="{{url('login')}}">
                    @csrf

                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
                    @endif

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                      {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>

                    {{-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  </form>
            </div>
          </div>
        
        
    </div>
</div>
@endsection