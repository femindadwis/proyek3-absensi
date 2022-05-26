@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<div class="h3 mb-4 text-gray-800">

    @include('sweetalert::alert')

    @if ($errors->any())
    <div class="alert alert-danger border-left-danger" role="alert">
        <ul class="pl-4 my-2">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- <a class="btn btn-success btn-icon-split" href="{{ route('MstJabatan.create') }}">
    <span class="icon text-white-50">
        <i class="fas fa-plus-circle"></i>
    </span>
    <span class="text">{{ __('Tambah') }}</span>
    </a> --}}

    <!-- Topbar Search -->
    {{-- <form action="{{ url()->current() }}"
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" name="keyword" value="{{ old('keyword') }}" class="form-control bg-light border-1 small"
            placeholder="Cari Nama" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
    </form> --}}

</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Detail Riwayat Absensi') }}</h6>
    </div>

    <div class="card-body">
        <div class="input-group mb-3 col-md-5 float-right">
            <input type="text" id="created_at" name="date" class="form-control">

            <a target="_blank" class="btn btn-primary ml-2" id="exportexcel">Cetak Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Foto Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Foto Pulang</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($lists as $item)

                    <tr>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td><a href="#myModal" data-toggle="modal" data-gallery="example-gallery" class="col-sm-3" data-img-url="{{asset('/uploads/img/absensi/'.$item->ft_selfie_in)}}">
                            <img src="{{asset('/uploads/img/absensi/'.$item->ft_selfie_in)}}" class="img-fluid image-control">
            
                        </a></td>
                        <td>{{ $item->jam_keluar }}</td>
                        <td><a href="#myModal" data-toggle="modal" data-gallery="example-gallery" class="col-sm-3" data-img-url="{{asset('/uploads/img/absensi/'.$item->ft_selfie_out)}}">
                            <img src="{{asset('/uploads/img/absensi/'.$item->ft_selfie_out)}}" class="img-fluid image-control">
            
                        </a></td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('absensi.detail',$item->id) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>

            {{ $lists->links() }}
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="" src="#" style="width: 400px; height: 264px;"/>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    $(function () {

        var base_url = '{!!url()->current()!!}';

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function (start, end, label) {
            console.log(base_url + '/detail/export/' + start.format('YYYY-MM-DD') + '+' + end.format(
                'YYYY-MM-DD'));
            $('#exportexcel').attr('href', base_url + '/detail/export/' + start.format('YYYY-MM-DD') +
                '+' + end.format('YYYY-MM-DD'))
        });
    });

</script> --}}
@endsection
@section('js')
<script>
    //KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
    $(document).ready(function () {
        let start = moment().startOf('month')
        let end = moment().endOf('month')

        var base_url = '{!!url()->current().'/'!!}';

        //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
        $('#exportexcel').attr('href', base_url + 'export/' + start.format('YYYY-MM-DD') +
                '+' + end.format('YYYY-MM-DD'))

        //INISIASI DATERANGEPICKER
        $('#created_at').daterangepicker({
            dateFormat: 'yy-mm-dd' ,
            startDate: start,
            endDate: end
        }, function (first, last) {
            //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
            $('#exportexcel').attr('href', base_url + 'export/' + start.format('YYYY-MM-DD') +
                '+' + end.format('YYYY-MM-DD'))
        })
    });
    $('div a').click(function(e) {
        $('#myModal img').attr('src', $(this).attr('data-img-url')); 
    });
</script>
@endsection
