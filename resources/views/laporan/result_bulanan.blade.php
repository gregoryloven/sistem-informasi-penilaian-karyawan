@extends('layouts.admin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Hasil Pecarian Laporan Bulanan</h1>
        </div>

        <div class="section-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Hasil Pecarian Laporan Bulanan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    @if($performances->count() > 0)
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Pelayanan</th>
                            <th>Kebersihan</th>
                            <th>Kerjasama</th>
                            <th>Kedisiplinan</th>
                            <th>Pengetahuan Produk</th>
                            <th>Komunikasi</th>
                            <th>Rata-Rata</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($performances as $performance)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $performance->employee->nama }}</td>
                            <td>{{ $performance->pelayanan }}</td>
                            <td>{{ $performance->kebersihan }}</td>
                            <td>{{ $performance->kerjasama }}</td>
                            <td>{{ $performance->kedisiplinan }}</td>
                            <td>{{ $performance->pengetahuan_produk }}</td>
                            <td>{{ $performance->komunikasi }}</td>
                            <td>{{ $performance->average }}</td>
                            <td>{{ $performance->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Tidak ada data yang ditemukan untuk bulan tersebut.</p>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection
