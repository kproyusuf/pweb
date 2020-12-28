@extends('layouts.pemilik')


@section('content')

<div class="container" style="padding-top: 100px; padding-bottom: 125px;">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h6 class="mb-2 mb-sm-0 pt-1">
                <a href="{{ url('lowongan-pemilik') }}">Lowongan</a>
                {{-- <span>/</span>
                <span></span> --}}
                <a href="{{ url('lowongan-pemilik-baru') }}" class="btn btn-primary py-2 px-2">Lowongan baru</a>
                </h4>
        </div>
    </div>
    <!-- Heading -->

    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Pemilik</th>
                            <th>Kapasitas Pekerja</th>
                            <th>Gambar</th>
                            <th>Gaji</th>
                            <th>Ditampilkan</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($job as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->job_name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->owner->name }}</td>
                                <td>{{ $item->job_capacity }} Orang</td>
                                <td>
                                    <img src="{{ asset('uploads/jobimage/'.$item->job_image) }}" width="100px">
                                </td>
                                <td>Rp {{ $item->job_salary }}</td>
                                <td>
                                    <input type="checkbox" {{ $item->job_status == '1' ? 'checked' : ' ' }}>
                                </td>
                                <td>
                                    <a href="{{ url('lamaran-pencari/'.$item->id) }}"
                                        class="badge btn btn-info"> Lamaran</a>
                                    <a href="{{ url('edit-lowongan-pemilik/'.$item->id) }}"
                                        class="badge btn btn-primary">Edit</a>
                                    <a href="{{ url('hapus-lowongan-pemilik/'.$item->id) }}"
                                        class="badge btn btn-danger"
                                        onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
