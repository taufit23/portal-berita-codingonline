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
                            <div class="card-title">Form tambah Playlist</div>
                            <a href="{{ route('playlist.index') }}" class="btn btn-sm btn-secondary ml-auto"><i
                                    class="fas fa-long-arrow-alt-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('playlist.update', $playlist->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="judul_playlist">Judul playlist</label>
                                <input type="text" class="form-control" id="judul_playlist"
                                    placeholder="Masukan Judul Playlist" name="judul_playlist"
                                    value="{{ old('judul_playlist', $playlist->judul_playlist) }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5"
                                    class="form-control">{{ old('deskrripsi', $playlist->deskripsi) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar_playlist">Gambar Playlist</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('upload/' . $playlist->gambar_playlist) }}"
                                            class="img img-fluid img-thumnail">
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="gambar_playlist" id="gambar_playlist"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="0" {{ $playlist->is_active == '0' ? 'selected' : '' }}>Draft</option>
                                    <option value="1" {{ $playlist->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
