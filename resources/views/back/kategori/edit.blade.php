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
                            <div class="card-title">Form edit : {{ $kategori->nama_kategori }}</div>
                            <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-secondary ml-auto"><i
                                    class="fas fa-long-arrow-alt-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="text" class="form-control" id="nama_kategori"
                                    placeholder="Masukan nama kategori" name="nama_kategori"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
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
