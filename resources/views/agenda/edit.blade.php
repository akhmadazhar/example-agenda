@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Customer</h6>
                </div>
                <div class="card-body px-2 pt-0 pb-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/agenda/{{ $agenda->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Nik Pegawai</label>
                            <input name="nik_pegawai" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="NIK" value="{{ $agenda->nik_pegawai }}">
                        </div>
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input name="judul" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Judul" value="{{ $agenda->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Deksripsi" value="{{ $agenda->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" value="{{ $agenda->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Lokasi" value="{{ $agenda->lokasi }}">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input name="status" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Status" value="{{ $agenda->status }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
