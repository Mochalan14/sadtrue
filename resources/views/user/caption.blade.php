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
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" id="tabel-caption">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Caption </th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($captionku as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td> {{ $item->caption }} </td>
                                                <td>
                                                    <div class="d-flex flex-wrap justify-content-between">
                                                        <a href="{{ route('home.caption.edit', ['id' => $item->id]) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="#" class="btn btn-danger hapusDataku"
                                                            data-id="{{ $item->id }}">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-dt')
    <script>
        $(document).ready(function() {
            $('#tabel-caption').DataTable();
        });
    </script>

    <script>
        $('.hapusDataku').click(function() {
            var dataid = $(this).attr('data-id');
            swal({
                    title: "Yakin Mau Dihapus?",
                    text: "sekali kehapus, gak bakal balik lagi loh",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/caption/delete/" + dataid + ""
                        swal("Data Berhasil Dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Batal Dihapus");
                    }
                });

        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
