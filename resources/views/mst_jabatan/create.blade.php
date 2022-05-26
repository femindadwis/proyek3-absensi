@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('Tambah Jabatan') }}</h5>
        </div>

        <form method="POST" action="{{ route('MstJabatan.store') }}" autocomplete="off">
            {{ csrf_field() }}
            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-12 order-lg-4">

                            <div class="card-body">

                                <div class="row">
                                   
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="jabatan">Nama<span
                                                        class="small text-danger">*</span>
                                            </label>
                                            <input type="text" id="jabatan" class="form-control" name="jabatan"
                                                   placeholder="Nama" required =""  >

                                            @error('jabatan')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="{{ route('MstJabatan.index') }}" class="btn btn-link">{{ __('Kembali') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            </div>
        </form>
    </div>
@endsection
