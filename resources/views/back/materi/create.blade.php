@extends('back.layouts.default')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form tambah Materi</div>
                            <a href="{{ route('materi.index') }}" class="btn btn-sm btn-secondary ml-auto"><i
                                    class="fas fa-long-arrow-alt-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul_materi">Judul materi</label>
                                <input type="text" class="form-control" id="judul_materi"
                                    placeholder="Masukan Judul materi" name="judul_materi">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Link video</label>
                                <input type="text" class="form-control" id="link" placeholder="Masukan Link video"
                                    name="link">
                            </div>
                            <div class="form-group">
                                <label for="gambar_materi">Gambar materi</label>
                                <input type="file" name="gambar_materi" id="gambar_materi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="playlist_id">Status</label>
                                <select name="playlist_id" id="playlist_id" class="form-control">
                                    @foreach ($playlist as $row)
                                        <option value="{{ $row->id }}">{{ $row->judul_playlist }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="0">Draft</option>
                                    <option value="1">Publish</option>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
