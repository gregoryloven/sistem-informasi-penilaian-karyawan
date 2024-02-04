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
          <h1>Laporan Harian</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4>Laporan Harian</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laporan.searchByDate') }}">
                        @csrf
                        <div class="form-group">
                            <label for="datepicker">Pilih Tanggal:</label>
                            <input type="text" id="datepicker" name="selected_date" class="form-control" placeholder="Pilih tanggal" required>
                            @error('selected_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Cari -->
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                <!-- <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%">No</th>
                        <th>Nama</th>
                        <th width="20%"><i class="fa fa-cog"></i></th>
                    </tr>
                <thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @php $i += 1; @endphp
                        <tr>
                            <td>@php echo $i; @endphp</td>
                            <td>Edo</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table> -->
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
