@extends('layouts.admin')

@push('css')
<style>
    #myTable td {text-align: center; vertical-align: middle;}
</style>
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Laporan Bulanan</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Laporan Bulanan</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laporan.searchByMonth') }}">
                        @csrf
                        <div class="form-group">
                            <label for="month">Pilih Bulan:</label>
                            <select id="month" name="selected_month" class="form-control">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <!-- Tombol Cari -->
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

            </div>

        <div>
    </section>
<div>

@endsection

@section('javascript')
<script>

    flatpickr("#datepicker", {
        dateFormat: "Y-m-d",
        // Tambahan konfigurasi lain sesuai kebutuhan
    });
</script>

@endsection
