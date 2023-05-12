@extends('user.layout.app')

@section('konten')
    <div class="page-section" id="beranda">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Beranda</div>
                <h2 class="title-section">Semoga Menghibur</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row mt-5">
                @foreach ($captions as $item)
                    <div class="col-lg-4 mx-auto py-3 wow fadeInUp">
                        <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                            <div class="blockquote-custom-icon shadow-sm"><i class="fa fa-quote-left text-white"></i>
                            </div>
                            <p class="mb-0 mt-2 font-italic">"{{ $item->caption }}"</p>
                            <footer class="blockquote-footer pt-4 mt-4 border-top">
                                {{ $item->user->name }}
                            </footer>
                        </blockquote><!-- END -->
                    </div>
                @endforeach

                {{-- <div class="col-lg-4 mx-auto py-3 wow fadeInUp">
                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <div class="blockquote-custom-icon shadow-sm"><i class="fa fa-quote-left text-white"></i>
                        </div>
                        <p class="mb-0 mt-2 font-italic">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#"
                                class="text-info">@consequat</a>."</p>
                        <footer class="blockquote-footer pt-4 mt-4 border-top">Someone famous in
                            <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote><!-- END -->
                </div> --}}
            </div>
        </div>
    </div>
@endsection

<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif
</script>
