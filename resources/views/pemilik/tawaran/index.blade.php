@extends('layouts.pemilik')


@section('content')

<div class="container" style="padding-top: 100px; padding-bottom: 125px;">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h6 class="mb-2 mb-sm-0 pt-1">
                <a href="{{ url('tawaran-pemilik') }}">Tawaran yang Dikirim</a>
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
                                <th class="text-center">Nama Pekerjaan</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Lowongan</th>
                                <th class="text-center">Resume</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">edit</th>
                                {{-- <th class="text-center">Email</th>
                                <th class="text-center">Resume</th>
                                <th class="text-center">Verifikasi</th>
                                <th class="text-center">Detail</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offer as $o_item)
                            <tr>
                                <td>{{ $o_item->id }}</td>
                                <td>{{ $o_item->user->name }}</td>
                                <td>
                                    <a href="{{ asset('uploads/profile/'.$o_item->user->picture) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/profile/'.$o_item->user->picture) }}"
                                            alt="" style="width: 100px">
                                    </a>
                                </td>
                                <td>{{ $o_item->jobs->job_name }}</td>
                                <td>
                                    <a href="{{ asset('uploads/resume/'.$o_item->user->resume) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/resume/'.$o_item->user->resume) }}"
                                            alt="" style="width: 100px">
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($o_item->user->workerver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diterima</label>
                                    @elseif($o_item->user->workerver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diterima</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('lihat-lamaran-pencari/'.$o_item->id)}}"
                                        class="badge btn btn-info px-3 py-2">Lihat</a>
                                    <a href="{{ url('cancel-tawaran/'.$o_item->id)}}"
                                        class="badge btn btn-danger px-3 py-2" onclick="return confirm('Are you sure?');">Batalkan</a>
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
