@extends('layouts.backend.staff')
<title>Perpustakaan - Daftar User</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">DAFTAR USER</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('staff.user.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data <i class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">add</i></a>
        <table class="table" id="example">
            <thead class="table">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $data)
                @if ($data->isAdmin == 'user' || $data->isAdmin == 'staff')

                {{-- @foreach ($users as $data) --}}
                <tr>
                    <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->alamat}}</td>
                    <td class="text-center">{{$data->no_hp}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{ $data->isAdmin == 'staff' ? 'Staff' : 'User' }}</td>
                    <td>
                        <img src="{{ asset('images/user/' . $data->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="80" height="80" style="object-fit: cover;" alt="" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                    </td>
                    <td>
                        <form action="{{ route('staff.user.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('staff.user.edit', $data->id) }}" class="btn btn-warning text-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Data"> <i class="material-icons-outlined" style="font-size: 18px;">edit</i></a>
                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Data" onclick="return confirm('Apakah anda yakin??')"><i class="material-icons-outlined" style="font-size: 18px;">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
