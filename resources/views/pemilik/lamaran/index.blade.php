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
                <a href="{{ url('lowongan-pemilik-baru') }}" class="btn btn-primary py-2 px-2">Daftar Pelamar</a>
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
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">foto</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Resume</th>
                                {{-- <th class="text-center">Aktifitas</th> --}}
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u_item)
                            <tr>
                                <td>{{ $u_item->id }}</td>
                                <td>{{ $u_item->name }}</td>
                                <td>
                                    <a href="{{ asset('uploads/profile/'.$u_item->picture) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/profile/'.$u_item->picture) }}" alt="" style="width: 100px">
                                    </a>
                                </td>
                                <td>{{ $u_item->email }}</td>
                                <td>
                                    <a href="{{ asset('uploads/resume/'.$u_item->resume) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/resume/'.$u_item->resume) }}" alt="" style="width: 100px">
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($u_item->ownerver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diterima</label>
                                    @elseif($u_item->ownerver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diterima</label>
                                    @endif
                                    @if($u_item->workerver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Siap Bekerja</label>
                                    @elseif($u_item->workerver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Mengajukan Pengunduran</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('lihat-lamaran-pencari/'.$u_item->id)}}"
                                        class="badge badge-pill btn-info px-3 py-2">Lihat</a>
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
