@extends('layouts.app')

@section('title')
    blog
@endsection

@section('content')

    <h1 class="mt-3">Ubah Postingan</h1>

    <form action="{{url("posts/$posts->slug")}}" class="form-control" method="POST">
        @method('PATCH')
        @csr
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$posts->title}}" required>
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content" value="{{$posts->content}}" required>{{$posts->content}}</textarea>
          </div>
          <button type="submit" class="btn btn-outline-primary">Simpan</button>
          <a href="{{url('posts')}}" class="btn btn-outline-primary">Kembali</a>
          <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button>
          

        </form>

       

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah anda yakin mau hapus Postingan? <span class="text-danger">"{{$posts->title}}"</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{url("posts/$posts->id")}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endsection