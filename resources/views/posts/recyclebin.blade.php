@extends('layouts.app')

@section('title')
    blog
@endsection

@section('content')
        
    <h1 class="text-center ">
        <span class="text-primary">Blog</span> Coding 
        <a href="{{url('posts')}}" class="btn btn-outline-primary ">Kembali</a>
    </h1>
    
    @php($number = 1)

        @foreach($posts as $p)

        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{$p->title}}</h5>
              <p class="card-text">{{$p->content}}</p>
              <p class="card-text"><small class="text-muted">Last updated {{ date("d M Y H:i", strtotime($p->created_at)) }}</small></p>
            </div>
        </div>

        @php($number++)
        @endforeach
        @endsection
       