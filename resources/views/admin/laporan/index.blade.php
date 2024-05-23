@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data Laporan</h3>

            <div class="box-tools">
              
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <a href="/superadmin/laporan/kriteria" target="_blank" class="btn btn-sm btn-success">LAP. KRITERIA</a>
            <a href="/superadmin/laporan/subkriteria" target="_blank" class="btn btn-sm btn-success">LAP. SUBKRITERIA</a>
            <a href="/superadmin/laporan/bobot" target="_blank" class="btn btn-sm btn-success">LAP. BOBOT NILAI</a>
            <a href="/superadmin/laporan/profil" target="_blank" class="btn btn-sm btn-success">LAP. PROFIL NILAI YG DI CARI</a>
          </div>
          <!-- /.box-body -->
        </div>
        
        <!-- /.box -->
      </div>
</div>


<div class="row">
  <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header">
          <i class="ion ion-clipboard"></i><h3 class="box-title">Data Laporan Rangking Siswa</h3>

          <div class="box-tools">
            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <form method="get" action="/superadmin/laporan/siswa" target="_blank">
          @csrf
          <select class="form-control" name="jurusan" required>
            <option value="">-</option>
            @foreach ($jurusan as $item)
                <option value="{{$item->nama}}">{{$item->nama}}</option>
            @endforeach
          </select>
          <br/>
          <button type="submit" class="btn btn-sm btn-success">CETAK</button>

          </form>
        </div>
        <!-- /.box-body -->
      </div>
      
      <!-- /.box -->
    </div>
</div>

@endsection
@push('js')

@endpush
