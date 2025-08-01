@extends('admin.template')
@section('content')
    <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Surat Masuk</h4>
                <p class="card-description">List seluruh surat yang masuk</p>
                <div class="table-responsive">
                    <div class="d-flex justify-content-end mb-3">
                        {{-- <div class="input-group" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Cari surat..." id="searchInput">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div> --}}
                    </div>

                    <table id="suratTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Surat</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Masuk</th>
                                <th>Asal Surat</th>
                                <th style="width: 200px;">Perihal</th>
                                <th>Status Disposisi</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $index => $surat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $surat->jenis_surat }}</td>
                                    <td>{{ $surat->no_surat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($surat->tanggal_masuk)->format('d M Y') }}</td>
                                    <td>{{ $surat->asal_surat }}</td>
                                    <td style="white-space: normal; word-wrap: break-word; max-width: 200px;">
                                        {{ $surat->perihal }}
                                    </td>
                                    <td>
                                        @if ($surat->status_disposisi == 'Belum')
                                            <label class="badge badge-warning">Belum</label>
                                        @elseif($surat->status_disposisi == 'Didisposisikan')
                                            <label class="badge badge-info">Didisposisikan</label>
                                        @else
                                            <label class="badge badge-success">Selesai</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('uploads/surat_masuk/' . $surat->file_surat) }}" target="_blank">
                                            Lihat File
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
