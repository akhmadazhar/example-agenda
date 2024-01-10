@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail Agenda</span></h4>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detail Agenda</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>NIK Pegawai</th>
                        <td>{{ $agenda->nik_pegawai }}</td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $agenda->judul }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $agenda->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $agenda->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{ $agenda->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $agenda->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Riwayat perjalanan</h3>
                        <div id="content">
                            <ul class="timeline">

                                <li class="event" data-date="12/03/2023 - 20:52">
                                    <h3>Dimasz → Udin</h3>
                                    <p>Catatan : Tolong gantikan sir</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection