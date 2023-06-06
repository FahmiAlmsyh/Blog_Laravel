@extends('layouts.app')

@section('title')
    blog
@endsection

@section('content')

    <h1 class="mt-3">Buat Postingan Baru</h1>
    <form action="{{url('posts')}}" class="form-control" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content"  required></textarea>
          </div>
          <button type="submit" class="btn btn-outline-primary">Simpan</button>
          <a href="{{url('posts')}}" class="btn btn-outline-primary">Kembali</a>

    </form>
    @endsection