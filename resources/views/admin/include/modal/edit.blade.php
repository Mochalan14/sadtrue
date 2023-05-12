<!-- Contoh Modal -->
<div class="modal fade" id="modalEditAdmin" tabindex="10" role="dialog" aria-labelledby="modalSayaLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">Edit Caption</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($dataCaption as $cp)
                    <form action="" class="contact-form" method="post">
                        @csrf
                        <div class="row form-group">
                            {{-- <div class="col-md-12 mb-3">
                    <label class="text-black" for="fname">Namamu</label>
                    <input type="text" id="fname" class="form-control" name="input_penulis">
                </div> --}}

                            <input type="hidden" name="input_id" value="{{ $cp->id }}">
                            <input type="hidden" name="input_penulis" value="{{ $cp->user_id }}">

                            <div class="col-md-12">
                                {{-- <label class="text-black" for="message">Caption</label> --}}
                                <textarea name="input_caption" id="message" cols="30" rows="5" class="form-control"
                                    placeholder="Tuangkan isi hati dan pikiranmu disini">{{ $cp->caption }}</textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Oke</button>

                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
