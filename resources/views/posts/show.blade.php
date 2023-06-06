@extends('layouts.app')

@section('title')
    blog
@endsection

@section('content')

        <article class="blog-post mt-3">
            <h2 class="blog-post-title mb-1">{{$posts->title}}</h2>
            <p class="blog-post-meta">{{date("d M Y H:i", strtotime($posts->created_at))}} by <a href="#">Fahm</a></p>


            <p>{{$posts->content}}</p>

            <small class="text-muted">{{$total_comments}} Komentar</small>
            

            @foreach($comments as $comment)
            
            <div class="card mb-3">
                <div class="card-body">
                    <p style="font-size: 10 pt">{{ $comment->comment }}</p>
                </div>
            </div>

            @endforeach
            <div class="p">
                <a href="{{url("posts")}}" class="btn btn-outline-primary">Kembali</a>
                
            </div>
            
          </article>

          
          @endsection
          