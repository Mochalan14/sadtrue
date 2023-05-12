@extends('user.layout.app')

@section('konten')
    <div class="page-section" id="beranda">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Kelola Captionmu</div>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row mt-5">
                <div class="col-lg grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('home.caption') }}" class="btn btn-primary">Kembali</a>
                            @foreach ($dataCaption as $cp)
                                <form action="{{ route('home.caption.update') }}" class="contact-form mt-3" method="post">
                                    @csrf
                                    <div class="row form-group">

                                        <input type="hidden" name="input_id" value="{{ $cp->id }}">
                                        <input type="hidden" name="input_penulis" value="{{ $cp->user_id }}">

                                        <div class="col-md-12">
                                            {{-- <label class="text-black" for="message">Caption</label> --}}
                                            <textarea name="input_caption" id="message" cols="30" rows="5" class="form-control"
                                                placeholder="Tuangkan isi hati dan pikiranmu disini">{{ $cp->caption }}</textarea>
                                            @error('input_caption')
                                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>

                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
