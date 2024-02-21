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
                        <td>{{ $agenda->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pegawai</th>
                        <td>{{ $agenda->user->name }}</td>
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
                        <th>Start</th>
                        <td>{{ $agenda->start }}</td>
                    </tr>
                    <tr>
                        <th>End</th>
                        <td>{{ $agenda->end }}</td>
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
            <br>
            @if ($agenda->status === 'Diajukan')
                <div class="gap-2 d-flex justify-content-md-center">
                    <form action="{{ route('agenda.updateStatus', ['id' => $agenda->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Verifikasi Kehadiran</button>
                    </form>
                    <!-- Tombol Disposisi -->
                    <a href="agenda/create" class="btn btn-primary">Disposisikan</a>
                </div>
            @endif
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
