@extends('layouts.app')

@section('title', 'Daftar Kelas Bootcamp')

@section('content')

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h2 style="margin-bottom: 4px; color: #1b2d4f;">Daftar Kelas Bootcamp</h2>
                <p class="text-secondary">Data tabel di bawah ini diload dinamis via DataTables (Server-Side)</p>
            </div>
            <a href="/tambah-produk" class="btn-primary" style="text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Tambah Kelas
            </a>
        </div>

        <div style="overflow-x: auto;">
            <table id="produk-table" style="width: 100%; border-collapse: collapse; font-size: 14px;" class="display">
                <thead>
                    <tr style="background: #f0f4ff; border-bottom: 2px solid #d0daf0;">
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">No</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Nama Kelas</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">SKU</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Kategori</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Harga/Orang</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Kuota</th>
                        <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">QR Code</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #d0daf0;
            border-radius: 6px;
            padding: 6px 12px;
            outline: none;
            margin-bottom: 15px;
        }
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #d0daf0;
            border-radius: 6px;
            padding: 6px;
            outline: none;
        }
        .btn-qr {
            background: #1b3a6b; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; display: inline-block;
        }
    </style>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#produk-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("produk.data-ajax") }}',
                columns: [
                    { data: 'id', name: 'id', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    { data: 'nama', name: 'nama', render: function(data) {
                        return '<strong>' + data + '</strong>';
                    }},
                    { data: 'sku', name: 'sku', render: function(data) {
                        return '<code style="background:#f3f6fb;color:#1b3a6b;padding:3px 8px;border-radius:4px;">' + data + '</code>';
                    }},
                    { data: 'kategori', name: 'kategori' },
                    { data: 'harga_format', name: 'harga_format' },
                    { data: 'stok', name: 'stok', render: function(data) {
                        return data + ' slot';
                    }},
                    { data: 'qr_code', name: 'qr_code', orderable: false, searchable: false }
                ]
            });
        });
    </script>
    @endpush

@endsection

