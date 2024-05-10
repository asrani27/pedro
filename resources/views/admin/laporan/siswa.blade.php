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
            <td colspan=3 style="text-align:center"><br/><strong><u>LAPORAN SISWA</u></strong></td>
        </tr>
    </table>
    <br/>
    <table border=1 cellspacing="0" cellpadding="3" width="100%">
        <tr>
            <th>No</th>
            <th>NIS </th>
            <th>Nama Siswa</th>
            <th>Cocok Di Jurusan</th>
            <th>Nilai</th>
        </tr>
        @php
            $no =1;
        @endphp
        @foreach ($data as $key => $item)
            <tr>
                <td style="text-align: center">{{$no++}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->jurusan}}</td>
                <td>{{$item->nilai}}</td>
              
                
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