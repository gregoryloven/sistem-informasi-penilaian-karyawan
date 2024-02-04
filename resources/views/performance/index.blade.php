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
          <h1>Daftar Penilaian Karyawan</h1>
        </div>

        <div class="section-body">
        @if($user == 1)
            <a href="#modalCreate" data-toggle='modal' class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah Penilaian</a><br><br>
        @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    Daftar Penilaian Karyawan 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align: center;" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Karyawan</th>
                                    <th>Pelayanan</th>
                                    <th>Kebersihan</th>
                                    <th>Kerjasama</th>
                                    <th>Kedisiplinan</th>
                                    <th>Pengetahuan Produk</th>
                                    <th>Komunikasi</th>
                                    <th>Rata-Rata</th>
                                    <th width="20%"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach($data as $d)
                                @php $i += 1; @endphp
                                <tr>
                                    <td>@php echo $i; @endphp</td>
                                    <td>{{$d->employee->nama}}</td>
                                    <td>{{$d->pelayanan}}</td>
                                    <td>{{$d->kebersihan}}</td>
                                    <td>{{$d->kerjasama}}</td>
                                    <td>{{$d->kedisiplinan}}</td>
                                    <td>{{$d->pengetahuan_produk}}</td>
                                    <td>{{$d->komunikasi}}</td>
                                    <td>{{$d->average}}</td>
                                    <td>
                                    @if($user == 1)
                                        <form id="delete-form-{{ $d->id }}" action="{{ route('performance.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <a href="#modalEdit" data-toggle="modal" class="btn btn-icon btn-warning" onclick="EditForm({{ $d->id }})"><i class="far fa-edit"></i></a> -->

                                            <input type="hidden" class="form-control" id='id' name='id' placeholder="Type your name" value="{{$d->id}}">
                                            <button type="button" class="btn btn-icon btn-danger" data-id="{{ $d->id }}"><i class="fa fa-trash"></i></button>                                   
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </section>
</div>

<!-- CREATE WITH MODAL -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <form role="form" method="POST" action="{{ url('performance') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tambah Karyawan</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label>Karyawan</label>
                        <select class="form-control" id='employee_id' name='employee_id' required>
                            <option value="" disabled selected>Pilih</option>
                                @foreach($employee as $c)
                                <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Pelayanan</label>
                            <input type="number" class="form-control nilai" id='pelayanan' name='pelayanan' min="1" max="100" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kebersihan</label>
                            <input type="number" class="form-control nilai" id='kebersihan' name='kebersihan' min="1" max="100" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kerjasama</label>
                            <input type="number" class="form-control nilai" id='kerjasama' name='kerjasama' min="1" max="100" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Kedisiplinan</label>
                            <input type="number" class="form-control nilai" id='kedisiplinan' name='kedisiplinan' min="1" max="100" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pengetahuan Produk</label>
                            <input type="number" class="form-control nilai" id='pengetahuan_produk' name='pengetahuan_produk' min="1" max="100" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Komunikasi</label>
                            <input type="number" class="form-control nilai" id='komunikasi' name='komunikasi' min="1" max="100" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rataRata">Nilai Rata-Rata</label>
                        <input type="text" class="form-control" id="rataRata" name="rata_rata" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT WITH MODAL-->
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
            <div style="text-align: center;">
                <!-- <img src="{{ asset('res/loading.gif') }}"> -->
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>

    // Hitung rata-rata secara otomatis saat nilai berubah
    $('.nilai').on('input', function() {
        var total = 0;
        $('.nilai').each(function() {
            total += parseInt($(this).val()) || 0;
        });

        var rataRata = total / $('.nilai').length;
        $('#rataRata').val(rataRata.toFixed(2));
    });

function EditForm(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("employee.EditForm")}}',
    data:{'_token':'<?php echo csrf_token() ?>',
          'id':id
         },
    success: function(data){
      $('#modalContent').html(data.msg)
    }
  });
}

$(document).on('click', '.btn-danger', function(e) {
    e.preventDefault();
    
    var id = $(this).data('id');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-form-' + id).submit();
        }
    });
});

</script>
@endsection