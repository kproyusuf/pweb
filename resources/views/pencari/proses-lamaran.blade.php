@extends('layouts.pencari')


@section('content')

<section class="" style="padding-top: 130px; padding-bottom: 150px;">
    <div class="container-fluid mt-5">
        @if (session('status2'))
            <div class="alert alert-success" role="alert">
                {{ session('status2') }}
            </div>
            @endif
            @if (session('status1'))
            <div class="alert alert-success" role="alert">
                {{ session('status1') }}
            </div>
            @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Gaji</th>
                                <th>Gambar</th>
                                <th>Diterima</th>
                                <th>Detail</th>
                            </thead>
                            <tbody>
                                @foreach ($job as $job_item)
                                <tr>
                                    <td>{{ $job_item->id }}</td>
                                    <td>{{ $job_item->job_name }}</td>
                                    <td>{{ $job_item->category->name }}</td>
                                    <td>{{ $job_item->job_salary }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/jobimage/'.$job_item->job_image) }}" width="100px">
                                    </td>
                                    {{-- <input type="checkbox" {{ $user->ownerver == '0' ? 'checked' : ' ' }}> --}}
                                    <td class="text-center">
                                        @if($user->ownerver == '0')
                                        <label class="py-2 px-3 badge btn-success">Diterima</label>
                                        @else
                                        <label class="py-2 px-3 badge btn-warning">Menunggu respon</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('lowongan/'.$job_item->category->url.'/'.$job_item->url) }}"
                                            class="badge btn btn-primary">Detail
                                        </a>
                                        <a href="{{ url('cancel') }}" class="badge btn btn-danger"
                                            onclick="return confirm('Apa anda ingin membatalkan lamaran?');">Batalkan</a>
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
</section>

@endsection
