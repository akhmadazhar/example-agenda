@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Add Agenda</h6>
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

                    <form action="/agenda" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nik Pegawai</label>
                            <input name="nik_pegawai" type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="NIK">
                        </div>
                        <div class="form-group">
                            <label for="">Judul</label>
                            <input name="judul" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Deksripsi">
                        </div>
                        <div class="form-group">
                            <label for="">Start</label>
                            <input name="start" type="datetime-local" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">End</label>
                            <input name="end" type="datetime-local" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Lokasi</label>
                            <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Lokasi">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input name="status" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Status">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
