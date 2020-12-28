@extends('layouts.admin')


@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h3 class="mb-2 mb-sm-0 pt-1">
                Pembayaran
            </h3>
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
                    <table id="datatable1" class="table table-striped table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Nama Pekerja</th>
                            <th>Lowongan</th>
                            <th>Nama Pemilik</th>
                            <th>Gaji</th>
                            <th>Bukti Transfer</th>
                            <th>Verifikasi Pekerja</th>
                            <th>Verifikasi Admin</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </thead>
                        <tbody>
                            @foreach ($payment as $p_item)
                            <tr>
                                <td>{{ $p_item->id }}</td>
                                <td>{{ $p_item->user->name }}</td>
                                <td>{{ $p_item->jobs->job_name }}</td>
                                <td>{{ $p_item->owner->name }}</td>
                                <td>Rp {{ $p_item->jobs->job_salary }}</td>
                                <td>
                                    <a href="{{ asset('uploads/payment/'.$p_item->transfer_proof) }}" target="_blank">
                                    <img src="{{ asset('uploads/payment/'.$p_item->transfer_proof) }}" width="100px">
                                </td>
                                <td class="text-center">
                                    @if($p_item->workerver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diterima</label>
                                    @elseif($p_item->workerver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diterima</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($p_item->adminver == '0')
                                    <label class="py-2 px-3 badge btn-primary">Sudah Diverifikasi</label>
                                    @elseif($p_item->adminver == '1')
                                    <label class="py-2 px-3 badge btn-danger">Belum Diverifikasi</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($p_item->status == '1')
                                    <label class="py-2 px-3 badge btn-primary">Aktif</label>
                                    @elseif($p_item->status == '0')
                                    <label class="py-2 px-3 badge btn-danger">Tidak Aktif</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('verifikasi-pembayaran-admin/'.$p_item->id) }}"
                                        class="py-2 px-3 btn btn-primary">Verifikasi</a>
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

@section('scripts')
<script>
    $(document).ready(function () {
        $('#datatable1').DataTable();
    });

</script>
@endsection
