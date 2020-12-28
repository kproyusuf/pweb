@extends('layouts.pemilik')


@section('title')
Kategori - Lowongan - Detail Lowongan
@endsection

@section('content')

<section class="py-5" style="margin-top: 125px">

    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="border">
                                    <img src="{{ asset('uploads/worker/'.$worker->img_thumb) }}" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="py-2">
                                    <small class="text-gray mb-0">Pekerja > {{ $worker->category->name }} >
                                        {{ $worker->user->name }} </small>
                                </div>
                                <div class="product-heading py-2 border-top">
                                    <h5 class="mb-0 font-weight-bold">{{ $worker->user->name }}
                                        {{ $worker->user->lname }}</h5>
                                </div>
                                <div class="py-2">
                                    {{-- <small>
                                    Rating :
                                    @for($i=1; $i<5; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                    @endfor
                                </small>
                                <h5 class="font-italic badge badge-primary ml-3 px-2"> {{ $worker->user->name }} </h5>
                                    --}}
                                </div>
                                <div class="product-price">
                                    <h5>
                                        <span class="offer-price">{!! $worker->user->phone !!} </span>
                                    </h5>
                                </div>

                                <form action="{{ url('/kirim-tawaran') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="py-5">
                                        <div class="form-group">
                                            <select name="job_id" class="form-control" required>
                                                <option value="">Pilih Lowongan</option>
                                                @foreach ($job as $job_item)
                                                <option value="{{ $job_item->id }}">{{ $job_item->job_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input id="user_id" type="hidden" name="user_id" value='{{ $worker->user_id }}'>

                                    <input id="owner_id" type="hidden" name="owner_id" value='{{ Auth::user()->id }}'>

                                    <div class="py-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Kirim Tawaran</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="product-small-description py-2 border-top">
                                    {!! $worker->work_experience !!}
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="product-highlights py-2 border-top">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="highlights-heading mb-0 font-weight-bold">Resume</h6>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ asset('uploads/resume/'.$worker->user->resume) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection
