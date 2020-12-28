@extends('layouts.pemilik')

@section('content')

<div class="container-fluid mt-5" style="padding-top: 50px; padding-bottom: 125px;">
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-body">
                    <h6>
                        <a href="{{ url('lowongan-pemilik') }}">Lowongan</a>
                        <span>/</span>
                        <a href="{{ url('lamaran-pencari/'.$users->job_id) }}">Lihat Pelamar</a>
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
                    <form action="{{ url('update-lamaran-pencari/'.$users->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Depan</label>
                                    <input type="text" name="fname" class="form-control" value="{{ $users->name }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Belakang</label>
                                    <input type="text" name="lname" class="form-control" value="{{ $users->lname }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Foto</label> <br>
                                    <a href="{{ asset('uploads/profile/'.$users->picture) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/profile/'.$users->picture) }}" alt=""
                                            style="width: 100px">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="address" class="form-control" readonly
                                        value="{{ $users->address }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nomor Telepon</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $users->phone }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Resume</label> <br>
                                    <a href="{{ asset('uploads/resume/'.$users->resume) }}" target="_blank">
                                        <img width="500px" src="{{ asset('uploads/resume/'.$users->resume) }}" alt=""
                                            style="width: 100px">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nomor Rekening</label>
                                    <input type="text" name="no_rek" class="form-control" value="{{ $users->no_rek }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="ownerver" class="form-control">
                                        <option value="{{ $users->ownerver }}">
                                            @if($users->ownerver == '0')
                                            <label class="py-2 px-3 badge btn-primary">Diterima</label>
                                            @elseif($users->ownerver == '1')
                                            <label class="py-2 px-3 badge btn-danger">Jangan Terima Dulu</label>
                                            @endif
                                        </option>
                                        <option value="0">Terima Pelamar</option>
                                        <option value="1">Jangan Terima dulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input id="job_id" type="hidden" name="job_id" value='{{ $users->job_id }}'>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <form action="{{ url('tolak/'.$users->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    @if($users->workerver == '0')
                                        @if($users->ownerver == '1')
                                            <a href="{{ url('tolak/'.$users->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?');">Tolak</a>
                                        @elseif($users->ownerver == '0')
                                            <a href="{{ url('tolak/'.$users->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda ingin Memberhentikan Pekerja ini?');">Berhentikan</a>
                                        @endif
                                    @elseif($users->workerver == '1')
                                    <input id="job_id" type="hidden" name="job_id" value='{{ $users->job_id }}'>
                                    <td class="text-center">
                                        <button type="submit" class="badge btn btn-danger px-3 py-2"
                                            onclick="return confirm('Apakah anda ingin Memberhentikan Pekerja ini?');">Berhentikan</button>
                                    </td>
                                </form>
                                @endif
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
