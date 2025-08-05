@extends('admin.template')

@section('content')
<div class="row col-10">
    <div class="col-12 text-center mb-3">
        <h4 class="bg-primary text-white py-2 rounded">Detail Disposisi Surat</h4>
    </div>

    <div id="settings-trigger" title="Kembali ke Data Disposisi">
        <a href="{{ route('admin.suratmasuk.disposisi') }}">
            <i class="ti-arrow-left"></i>
        </a>
    </div>

    <div class="col-md-4">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white">Detail Surat</div>
            <div class="card-body">
                <p><strong>No. Surat:</strong> {{ $disposisi->surat->no_surat }}</p>
                <p><strong>Tanggal Surat:</strong> {{ \Carbon\Carbon::parse($disposisi->surat->tanggal_surat)->format('d F Y') }}</p>
                <p><strong>Tanggal Masuk:</strong> {{ \Carbon\Carbon::parse($disposisi->surat->tanggal_masuk)->format('d F Y') }}</p>
                <p><strong>Perihal:</strong> {{ $disposisi->surat->perihal }}</p>
                <p><strong>Asal Instansi:</strong> {{ $disposisi->surat->asal_surat }}</p>
                <p><strong>Dari:</strong> {{ $disposisi->dari->name }}</p>
                <p><strong>Tujuan:</strong>
                    @foreach (explode(',', $disposisi->kepada_bidang) as $bidang)
                        <span class="badge badge-outline-primary">{{ $bidang }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-info mb-3">
            <div class="card-header bg-info text-white">File Surat</div>
            <div class="card-body p-2">
                <embed src="{{ asset('uploads/surat_masuk/' . $disposisi->surat->file_surat) }}" width="100%" height="500px" type="application/pdf">
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card border-info mt-3">
            <div class="card-header bg-info text-white">Isi Disposisi</div>
            <div class="card-body">
                <p>{{ $disposisi->isi_disposisi }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
