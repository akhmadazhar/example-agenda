@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Permohonan /</span> Agenda</h4>
    <div class="card">
        <h5 class="card-header">Daftar Agenda</h5>
        @if (auth()->user()->id === 0)
            <a href="agenda/create" class="btn btn-primary">Create</a>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIK Pegawai</th>
                        <th>Nama Pegawai</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($agendas as $agenda)
                        <tr>
                            <td>{{ $agenda->nik }}</td>
                            {{-- <td>{{ $agenda->user->name ?? 'ww' }}</td> --}}
                            <td>{{ optional($agenda->user)->name ?? 'wwa' }}</td>
                            <td>{{ $agenda->judul }}</td>
                            <td>{{ $agenda->deskripsi }}</td>
                            <td>{{ $agenda->start }}</td>
                            <td>{{ $agenda->end }}</td>
                            <td>{{ $agenda->lokasi }}</td>
                            <td>{{ $agenda->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="{{ route('agenda.detail', ['id' => $agenda->id]) }}">
                                            <i class="bx bx-detail me-1"></i>Detail
                                        </a>
                                        @if (auth()->user()->id === 0)
                                            <a class="dropdown-item"
                                                href="{{ route('agenda.edit', ['id' => $agenda->id]) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>

                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="deleteAgenda({{ $agenda->id }})">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                    </div>
                    @endif
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>

    <script>
        function deleteAgenda(agendaId) {
            if (confirm('Are you sure you want to delete this agenda?')) {
                var form = document.createElement('form');
                form.action = '/agenda/' + agendaId;
                form.method = 'POST';
                form.innerHTML = `
                @method('DELETE')
                @csrf
            `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        function editAgenda(agendaId) {
            return redirect('/agenda/edit/')
        }
    </script>
@endsection
