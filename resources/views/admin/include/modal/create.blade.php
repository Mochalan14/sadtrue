<!-- Contoh Modal -->
<div class="modal fade" id="modalCreateAdmin" tabindex="10" role="dialog" aria-labelledby="modalSayaLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">Buat Caption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('home.store') }}" class="contact-form" method="post">
                    @csrf
                    <div class="row form-group">
                        {{-- <div class="col-md-12 mb-3">
                    <label class="text-black" for="fname">Namamu</label>
                    <input type="text" id="fname" class="form-control" name="input_penulis">
                </div> --}}

                        <input type="hidden" name="input_penulis" value="{{ Auth::check() ? Auth::user()->id : '' }}">

                        <div class="col-md-12">
                            {{-- <label class="text-black" for="message">Caption</label> --}}
                            <textarea name="input_caption" id="message" cols="30" rows="5" class="form-control"
                                placeholder="Tuangkan isi hati dan pikiranmu disini"></textarea>
                            @error('input_caption')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Oke</button>

                </form>
            </div>
        </div>
    </div>
</div>
