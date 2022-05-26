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

    <a class="btn btn-success btn-icon-split" href="{{ route('MstJabatan.create') }}">
        <span class="icon text-white-50">
            <i class="fas fa-plus-circle"></i>
        </span>
        <span class="text">{{ __('Tambah') }}</span>
    </a>

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
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Role') }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($lists as $item)

                    <tr>
                        <td>{{ $item->jabatan }}</td>
                        <td>
                            <form action="{{route('MstJabatan.destroy',$item->id)}}" method="post"  onsubmit="return confirm('Yakin hapus data?')">
                                {{--                                    <a href="{{ route('mst-employee.show',$item->id_employee) }}"
                                class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                                </a>--}}
                                <a href="{{ route('MstJabatan.edit',$item->id) }}"
                                    class="btn btn-primary btn-circle btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>

                                @csrf
                                @method('DELETE')
                                {{-- <input type="hidden" name="_method" value="delete"> --}}
                                <button type="submit" class="btn btn-danger btn-circle btn-sm"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            {{ $lists->links() }}
        </div>
    </div>
</div>

@endsection
