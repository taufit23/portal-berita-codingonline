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
                            <div class="card-title">Form edit : {{ $artikel->judul }}</div>
                            <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-secondary ml-auto"><i
                                    class="fas fa-long-arrow-alt-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('artikel.update', $artikel->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul Artikel</label>
                                <input type="text" class="form-control" id="judul" placeholder="Masukan Judul Artikel"
                                    name="judul" value="{{ old('judul', $artikel->judul) }}">
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" rows="5"
                                    class="form-control">{{ old('body', $artikel->body) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $artikel->kategori_id == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar_artikel">Gambar Artikel</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('upload/' . $artikel->gambar_artikel) }}"
                                            class="img img-fluid img-thumbnail">
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="gambar_artikel" id="gambar_artikel" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="0" {{ $artikel->is_active == '0' ? 'selected' : '' }}>Draft</option>
                                    <option value="1" {{ $artikel->is_active == '1' ? 'selected' : '' }}>Publish</option>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
