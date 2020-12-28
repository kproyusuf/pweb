@extends('layouts.pencari')


@section('content')

<div class="container" style="padding-top: 150px; padding-bottom: 125px;">
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
            @if (session('status2'))
            <div class="alert alert-success" role="alert">
                {{ session('status2') }}
            </div>
            @endif
            @if (session('status1'))
            <div class="alert alert-danger" role="alert">
                {{ session('status1') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama Pekerja</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Deskrpisi</th>
                                <th class="text-center">Gaji</th>
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
                                <td>{{ $o_item->jobs->job_name }}</td>
                                <td>{{ $o_item->jobs->category->name }}</td>
                                <td>
                                    <a href="{{ asset('uploads/jobimage/'.$o_item->jobs->job_image) }}" target="_blank">
                                        <img width="500px"
                                            src="{{ asset('uploads/jobimage/'.$o_item->jobs->job_image) }}" alt=""
                                            style="width: 100px">
                                    </a>
                                </td>
                                <td>{{ $o_item->jobs->job_descrip }}</td>
                                <td>{{ $o_item->jobs->job_salary }}</td>
                                <td class="text-center">
                                    @if($o_item->user->workerver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diterima</label>
                                    @elseif($o_item->user->workerver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diterima</label>
                                    @endif
                                </td>

                                <form action="{{ url('terima-tawaran/'.$o_item->job_id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input id="owner_id" type="hidden" name="owner_id" value='{{ $o_item->owner_id }}'>
                                <td class="text-center">
                                    <a href="{{ url('lihat-lamaran-pencari/'.$o_item->job_id)}}"
                                        class="badge btn btn-info px-3 py-2">Lihat</a>
                                    <button type="submit" class="badge btn btn-primary px-3 py-2">Terima tawaran</button>
                                    <a href="{{ url('cancel-tawaran/'.$o_item->id)}}"
                                        class="badge btn btn-danger px-3 py-2"
                                        onclick="return confirm('Apakah anda ingin menolak tawran ini?');">Tolak</a>
                                </td>
                                </form>
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
