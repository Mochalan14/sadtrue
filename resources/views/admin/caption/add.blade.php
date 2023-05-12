@extends('admin.layout.app')

@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-contacts"></i>
                    </span> Kelola Caption
                </h3>
            </div>
            <div class="row">
                <div class="col-lg grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.caption') }}" class="btn btn-primary">Kembali</a>

                            <form action="{{ route('admin.caption.store') }}" class="contact-form mt-3" method="post">
                                @csrf
                                <div class="row form-group">
                                    {{-- <div class="col-md-12 mb-3">
                    <label class="text-black" for="fname">Namamu</label>
                    <input type="text" id="fname" class="form-control" name="input_penulis">
                </div> --}}

                                    <input type="hidden" name="input_penulis"
                                        value="{{ Auth::check() ? Auth::user()->id : '' }}">

                                    <div class="col-md-12">
                                        {{-- <label class="text-black" for="message">Caption</label> --}}
                                        <textarea name="input_caption" id="message" cols="30" rows="5" class="form-control"
                                            placeholder="Tuangkan isi hati dan pikiranmu disini"></textarea>

                                        @error('input_caption')
                                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
