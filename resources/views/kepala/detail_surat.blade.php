@extends('kepala.template')
@section('content')
    <div class="row col-10">
        <div class="col-12 text-center mb-3">
            <h4 class="bg-primary text-white py-2 rounded">Halaman Detail Surat Masuk</h4>
        </div>

        <div id="settings-trigger" title="Kembali ke Data Surat">
            <a href="{{ route('kepala.dataSuratMasuk') }}">
                <i class="ti-arrow-left"></i>
            </a>
        </div>

        {{-- Detail Surat dan Embed PDF --}}
        <div class="col-md-4">
            <div class="card border-info mb-3">
                <div class="card-header bg-info text-white">Detail Surat</div>
                <div class="card-body">
                    <p><strong>No. Surat:</strong> {{ $surat->no_surat }}</p>
                    <p><strong>Tanggal Surat:</strong> {{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d F Y') }}
                    </p>
                    <p><strong>Tanggal Diterima:</strong>
                        {{ \Carbon\Carbon::parse($surat->tanggal_masuk)->format('d F Y') }}</p>
                    <p><strong>Perihal:</strong> {{ $surat->perihal }}</p>
                    <p><strong>Asal Instansi:</strong> {{ $surat->asal_surat }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-info mb-3">
                <div class="card-header bg-info text-white">Tampilan Surat</div>
                <div class="card-body p-2">
                    <embed src="{{ asset('uploads/surat_masuk/' . $surat->file_surat) }}" width="100%" height="500px"
                        type="application/pdf">
                </div>
            </div>
        </div>

        {{-- FORM DISPOSISI DIBAWAH --}}
        <div class="col-12 mt-3">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    <strong>Disposisi</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('kepala.suratmasuk.disposisi') }}">
                        @csrf
                        <input type="hidden" name="surat_id" value="{{ $surat->id }}">

                        <div class="form-group">
                            <label><strong>Ditujukan Kepada :</strong></label>
                            <div class="ml-3">
                                @php
                                    $bidangs = [
                                        'Sekretaris',
                                        'Asset',
                                        'Akuntansi',
                                        'Anggaran',
                                        'Pembendaharaan',
                                        'Keuangan',
                                    ];
                                @endphp
                                @foreach ($bidangs as $bidang)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="kepada_bidang[]"
                                            value="{{ $bidang }}" id="{{ $bidang }}">
                                        <label class="form-check-label"
                                            for="{{ $bidang }}">{{ $bidang }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="isi_disposisi"><strong>Catatan</strong></label>
                            <textarea name="isi_disposisi" id="isi_disposisi" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Kirim Disposisi</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
