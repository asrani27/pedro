@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Siswa</h3>

          <div class="box-tools">
            <a href="/superadmin/perhitungan" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            NIS : {{$siswa->nis}}<br/>
            NAMA : {{$siswa->nama}}
        </div>
      </div>
    </div>
  </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-clipboard"></i> Perhitungan SPK Pemilihan Jurusan IPA, IPS dan Bahasa</h3>
    
              <div class="box-tools">
                <a href="/superadmin/perhitungan/{{$siswa->id}}/store/jurusan" class="btn btn-sm btn-success "><i class="fa fa-users"></i> Masukkan Kriteria</a>
                <a href="/superadmin/perhitungan/{{$siswa->id}}/simpan" class="btn btn-sm btn-success "><i class="fa fa-save"></i> Simpan Hasil</a>
                <a href="/superadmin/perhitungan/reset/{{$siswa->id}}" class="btn btn-sm btn-danger "><i class="fa fa-refresh"></i> Reset</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tbody>
                <tr>
                  <th class="text-center">No</th>
                  <th>Jurusan</th>
                  <th>Kriteria</th>
                  <th>Subkriteria</th>
                  <th>Nilai Profil</th>
                  <th>Nilai Yg Di Cari</th>
                  <th>GAP</th>
                  <th>Nilai GAP</th>
                  <th>Jenis</th>
                  <th>Rata-rata</th>
                  <th>Total</th>
                  <th>Ranking</th>
                </tr>
                @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{1 + $key}}</td>
                    <td>{{$item->jurusan->nama}}</td>
                    <td>{{$item->kriteria == null ? '' : $item->kriteria->nama}}</td>
                    <td>
                      @if ($item->subkriteria == null)
                          
                      <a href="/superadmin/perhitungan/subkriteria/{{$item->id}}/{{$siswa->id}}" class="btn btn-xs btn-flat  btn-success">Masukkan Nilai</a>
                      @else
                      {{$item->subkriteria->nama}}
                      <a href="/superadmin/perhitungan/subkriteria/{{$item->id}}/{{$siswa->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                      @endif
                    </td>
                    <td>{{$item->subkriteria == null ? '': $item->subkriteria->nilai}}</td>
                    <td>{{$item->nilai_dicari}}</td>
                    <td>{{$item->gap}}</td>
                    <td>{{$item->nilai_gap}}</td>
                      @if ($item->tampil_rata == "Y")
                      <td rowspan="2" style="text-align: center; vertical-align:middle" >
                        {{$item->factor->nama}}
                        {{$item->factor->persen}} %
                      </td>
                      @else
                          
                      @endif
                      @if ($item->factor_id == 1)
                              @if ($item->tampil_rata == "Y")
                              <td rowspan="2" style="text-align: center; vertical-align:middle; font-weight:bold;font-size:18px" >
                                {{$item->rata_core}}
                              </td>
                              @else
                                  
                              @endif
                      @else
                          @if ($item->tampil_rata == "Y")
                          <td rowspan="2" style="text-align: center; vertical-align:middle; font-weight:bold;font-size:18px"> 
                            {{$item->rata_second}}
                          </td>
                          @else
                              
                          @endif
                      @endif

                      @if ($item->tampil_total == "Y")
                      <td rowspan="4" style="text-align: center; vertical-align:middle; font-weight:bold;font-size:18px" >
                        {{$item->total}}
                      </td>
                      @else
                          
                      @endif

                      @if ($item->tampil_total == "Y")
                      <td rowspan="4" style="text-align: center; vertical-align:middle; font-weight:bold;font-size:18px" >
                        Rank : {{$ranking->where('jurusan_id', $item->jurusan_id)->first()->rank}}
                      </td>
                      @else
                          
                      @endif

                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>


@endsection
@push('js')

@endpush

