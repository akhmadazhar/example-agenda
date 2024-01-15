@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
    <div class="card">
        <h5 class="card-header">Data Pimpinan</h5>
        <a href="pegawai/create" class="btn btn-primary">Create</a>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Jabatan</th>
                        <th>Nik</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id_jabatan }}</td>
                            <td>{{ $user->nik }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    {{-- <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="{{ route('agenda.edit', ['id' => $agenda->id]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>

                                        <a class="dropdown-item" href="{{ route('agenda.detail', ['id' => $agenda->id]) }}">
                                            <i class="bx bx-detail me-1"></i>Detail
                                        </a>

                                        <a class="dropdown-item" href="javascript:void(0);"
                                            onclick="deleteAgenda({{ $agenda->id }})">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>

                                    </div> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
