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
                            <div class="card-title">Data artikel</div>
                            <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-primary ml-auto"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-responsive-lg table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Judul Artikel</th>
                                    <th>Slug</th>
                                    <th>Kategori</th>
                                    <th>Autor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artikel as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->kategori->nama_kategori }}</td>
                                        <td>{{ $row->users->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('artikel.edit', $row->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('artikel.destroy', $row->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
