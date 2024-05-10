<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <table border=0 width="100%">
        <tr>
            <td width="15%" style="text-align: right">
                <img src="/wl.png" width="50%">
            </td>
            <td style="text-align: center">
                <b>PEMERINTAH PROVINSI KALIMANTAN SELATAN DINAS PENDIDIKAN DAN KEBUDAYAAN<br/>SMAN-9 BARABAI</b><br/>
                Jl. Ksatria Ds. Batu Tangga Kec. Batang Alai Timur Kab. HST
                

            </td>
            <td width="15%" style="text-align: right">
                
            </td>
        </tr>
        <tr>
            <td colspan=3 style="text-align:center"><br/><strong><u>LAPORAN HASIL</u></strong></td>
        </tr>
    </table>
    <br/>
    <table border=1 cellspacing="0" cellpadding="3" width="100%">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
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
        @php
            $no =1;
        @endphp
        @foreach ($data as $key => $item)
        <tr>
            <td class="text-center">{{1 + $key}}</td>
            <td>{{$item->siswa->nama}}</td>
            <td>{{$item->kriteria == null ? '' : $item->kriteria->nama}}</td>
            <td>
              @if ($item->subkriteria == null)
                  
              <a href="/superadmin/perhitungan/subkriteria/{{$item->id}}" class="btn btn-xs btn-flat  btn-success">Masukkan Nilai</a>
              @else
              {{$item->subkriteria->nama}}
              <a href="/superadmin/perhitungan/subkriteria/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
              @endif
            </td>
            <td style="text-align: center">{{$item->subkriteria == null ? '': $item->subkriteria->nilai}}</td>
            <td style="text-align: center">{{$item->nilai_dicari}}</td>
            <td style="text-align: center">{{$item->gap}}</td>
            <td style="text-align: center">{{$item->nilai_gap}}</td>
              @if ($item->tampil_rata == "Y")
              <td rowspan="2" style="text-align: center; vertical-align:middle" >
                {{$item->factor->nama}}
                {{$item->factor->persen}} %
              </td>
              @else
                  
              @endif
              @if ($item->factor_id == 1)
                      @if ($item->tampil_rata == "Y")
                      <td rowspan="2" style="text-align: center; vertical-align:middle" >
                        {{$item->rata_core}}
                      </td>
                      @else
                          
                      @endif
              @else
                  @if ($item->tampil_rata == "Y")
                  <td rowspan="2" style="text-align: center; vertical-align:middle"> 
                    {{$item->rata_second}}
                  </td>
                  @else
                      
                  @endif
              @endif

              @if ($item->tampil_total == "Y")
              <td rowspan="4" style="text-align: center; vertical-align:middle" >
                {{$item->total}}
              </td>
              @else
                  
              @endif

              @if ($item->tampil_total == "Y")
              <td rowspan="4" style="text-align: center; vertical-align:middle" >
                Rank : {{$ranking->where('siswa_id', $item->siswa_id)->first()->rank}}
              </td>
              @else
                  
              @endif

        </tr>
        @endforeach
    </table>
    <br/>
    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td>
                Banjarbaru, {{\Carbon\Carbon::today()->translatedFormat('d F Y')}}, <br/>
                
                Mengetahui,
                <br/><br/><br/><br/><br/>


                <b><u>(................)</u></b><br/>
                NIP. (.................)

            </td>
        </tr>
    </table>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

$(document).ready(function(){
    window.print();
});
</script>
</html>