@extends('layouts.backend.user')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Beri Ulasan Buku</h5>
            <form class="row g-3" method="POST" action="{{ route('ulasan.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- <div class="col-md-6"> --}}
                    {{-- <label class="form-label">Nama</label> --}}
                    <input class="form-control mb-3" type="hidden" name="id_user" value="{{ Auth::user()->id }}" required>
                {{-- </div> --}}

                <div class="col-md-6">
                    <label for="input13" class="form-label">Penulis</label>
                    <div class="position-relative ">
                        <select class="form-control" name="id_peminjaman" placeholder="penulis" required>
                            @foreach ($pinjam as $data)
                            <option value="{{ $data->id }}">{{ $data->id_buku }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rating</label>
                    <select class="form-control mb-3" name="rating" required>
                        <option disabled selected>-- Pilih Ranting --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Ulasan</label>
                    <textarea class="form-control mb-3" name="ulasan" rows="4" placeholder="Tulis ulasan Anda di sini" required></textarea>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{ url()->previous() }}" class="btn btn-danger px-3 btn-sm">Batal</a>
                        <button type="submit" class="btn btn-success px-3 btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
