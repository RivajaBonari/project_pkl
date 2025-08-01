@extends('admin.template')
@section('content')
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Surat Masuk </h4>
                <p class="card-description">Form untuk menginputkan surat masuk ke sistem</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="forms-sample" method="POST" action="{{ route('admin.suratmasuk.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="jenis_surat">Jenis Surat</label>
                        <select id="jenis_surat" name="jenis_surat">
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option>Piagam</option>
                            <option>Notula</option>
                            <option>Laporan</option>
                            <option>Intruksi</option>
                            <option>Radiogram</option>
                            <option>Sertifikat</option>
                            <option>Pengumuman</option>
                            <option>Surat Izin</option>
                            <option>Surat Kuasa</option>
                            <option>Rekomendasi</option>
                            <option>Berita Acara</option>
                            <option>Surat Edaran</option>
                            <option>Telaahan Staf</option>
                            <option>Berita Daerah</option>
                            <option>Surat Undangan</option>
                            <option>Surat Pengantar</option>
                            <option>Lembaran Daerah</option>
                            <option>Surat Panggilan</option>
                            <option>Surat Perjanjian</option>
                            <option>Surat Keterangan</option>
                            <option>Surat Pernyataan Melaksanakan Tugas</option>
                            <option>Surat Tanda Tamat Pendidikan & Pelatihan</option>
                        </select>
                        @error('jenis_surat')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_surat">Nomor Surat</label>
                        <input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat') }}"
                            class="form-control">
                        @error('no_surat')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_surat">Tanggal Surat</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}"
                            class="form-control">
                        @error('tanggal_surat')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk Surat</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}"
                            class="form-control">
                        @error('tanggal_masuk')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="asal_surat">Asal Surat</label>
                        <input type="text" name="asal_surat" id="asal_surat" value="{{ old('asal_surat') }}"
                            class="form-control">
                        @error('asal_surat')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}"
                            class="form-control">
                        @error('perihal')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_surat">File Surat (PDF)</label>
                        <input type="file" name="file_surat" id="file_surat" value="{{ old('file_surat') }}"
                            class="form-control">
                        @error('file_surat')
                            <label style="color:red">{{ $message }}</label>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.dataSuratMasuk') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
