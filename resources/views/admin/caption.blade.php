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
                            <a href="{{ route('admin.caption.add') }}" class="btn btn-primary">Tambah Data</a>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" id="tabel-caption">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Nama Penulis </th>
                                            <th> Caption </th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataCaption as $item)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td> {{ $item->user->name }} </td>
                                                <td> {{ $item->caption }} </td>
                                                <td>
                                                    <a href="{{ route('admin.caption.edit', ['id' => $item->id]) }}"
                                                        class="btn btn-warning">Edit</a>

                                                    <a href="#" class="btn btn-danger hapusData"
                                                        data-id={{ $item->id }}>Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td> 2 </td>
                                            <td> Messsy Adam </td>
                                            <td> $245.30 </td>
                                            <td> July 1, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> John Richards </td>
                                            <td> $138.00 </td>
                                            <td> Apr 12, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 4 </td>
                                            <td> Peter Meggik </td>
                                            <td> $ 77.99 </td>
                                            <td> May 15, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 5 </td>
                                            <td> Edward </td>
                                            <td> $ 160.25 </td>
                                            <td> May 03, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 6 </td>
                                            <td> John Doe </td>
                                            <td> $ 123.21 </td>
                                            <td> April 05, 2015 </td>
                                        </tr>
                                        <tr>
                                            <td> 7 </td>
                                            <td> Henry Tom </td>
                                            <td> $ 150.00 </td>
                                            <td> June 16, 2015 </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.include.modal.create')
            @include('admin.include.modal.edit')
        </div>
    </div>
@endsection

@push('script-dt')
    <script>
        $(document).ready(function() {
            $('#tabel-caption').DataTable();
        });

        $('.hapusData').click(function() {
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
                        window.location = "/admin/caption/delete/" + dataid + ""
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
