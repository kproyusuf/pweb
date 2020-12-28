@extends('layouts.pemilik')

@section('content')

<div class="container-fluid mt-5" style="padding-top: 50px; padding-bottom: 125px;">
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="card">
                <div class="card-body">
                    <h6>
                        <a href="{{ url('lowongan-pemilik') }}">Lowongan</a>
                        <a>/</a>
                        <a>Lowongan Baru</a>
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
                    <form action="{{ url('simpan-lowongan-pemilik') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Pilih</option>
                                        @foreach ($category as $citem)
                                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input id="owner_id" type="hidden" name="owner_id" value='{{ Auth::user()->id }}'>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama lowongan</label>
                                    <input type="text" name="job_name" class="form-control" placeholder="Nama" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Custom URL (Slug)</label>
                                    <input type="text" name="url" class="form-control" placeholder='Isi URL' required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea rows="4" name="job_descrip" class="form-control" placeholder="Deskripsi" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kapasitas Pekerja</label>
                                    <input type="number" name="job_capacity" class="form-control" placeholder="Kapasitas" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="job_image" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Requirement</label>
                                    <textarea rows="4" name="job_req" class="form-control" placeholder="Requirement" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gaji</label>
                                    <input type="number" name="job_salary" class="form-control" placeholder="Gaji" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tampilkan / Sembunyikan</label>
                                    <input type="checkbox" name="job_status" class="" placeholder="Nama">
                                </div>
                            </div>

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
