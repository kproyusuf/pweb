@extends('layouts.pemilik')

@section('content')

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-body">
                    <h6>
                        <a href="{{ url('lowongan') }}">Lowongan</a>
                        <a href="">/</a>
                        <a href="">Edit Lowongan</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ url('bayar-pekerja/'.$payment->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama lowongan</label>
                                    <input type="text" name="job_name" class="form-control" value="{{ $payment->jobs->job_name }}" placeholder="Nama" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="transfer_proof" class="form-control">
                                        <img src="{{ asset('uploads/payment/'.$payment->transfer_proof) }}"
                                            width="100px">
                                </div>
                            </div>


                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tampilkan / Sembunyikan</label>
                                    <input type="checkbox" name="job_status" {{ $job->job_status == '1' ? 'checked':'' }}>
                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
