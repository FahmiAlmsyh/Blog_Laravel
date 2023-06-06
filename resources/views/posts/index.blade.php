@extends('layouts.app')

@section('title')
    blog
@endsection

@section('content')
    

    <h1 class="text-center ">
        <span class="text-primary">Blog</span> Coding 
        <a href="{{url('posts/create')}}" class="btn btn-outline-primary mx-2` ">+ Buat Postingan</a>
        <a href="{{url('posts/bin')}}" class="btn btn-outline-danger ">Bin</a>
    </h1>
    
    <p class="text-muted">
        Total Postingan Aktif : <span class="badge bg-success">{{$total_active}}</span> 
        Total Postingan Non Aktif : <span class="badge bg-warning"> {{$total_nonActive}}</span>
        Total Postingan Di Hapus : <span class="badge bg-danger">{{$total_dihapus}}</span> 
    </p>
    @php($number = 1)

        @foreach($posts as $p)



        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">{{$p->title}}</h5>
              <p class="card-text">{{$p->content}}</p>
              <p class="card-text"><small class="text-muted">Last updated {{ date("d M Y H:i", strtotime($p->created_at)) }}</small></p>
              <a href="{{ url("posts/$p->slug") }}" class="btn btn-outline-primary">Selengkapnya</a>
              <a href="{{ url("posts/$p->slug/edit") }}" class="btn btn-outline-danger">Edit</a>
            </div>
        </div>

        @php($number++)
        @endforeach
        @endsection


   