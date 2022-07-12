@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Kegiatan') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                @if ($message = Session::get('success'))
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <h4 class="alert-heading">Sukses</h4>
                            <p class="text-medium">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                @endif

                <div class="table-wrapper table-responsive">
                    <a href="{{route('kegiatan.create')}}" class="btn btn-outline-success">
                        <i class="fa fa-plus"></i> Tambah Kegiatan
                    </a>
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Kegiatan</h6>
                                </th>
                                <th>
                                    <h6>Waktu</h6>
                                </th>
                                <th>
                                    <h6>Tempat</h6>
                                </th>
                                <th>
                                    <h6>Sasaran</h6>
                                </th>
                                <th>
                                    <h6>Keterangan</h6>
                                </th>
                                <th>
                                    <h6>Aksi</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>
                                        <p>{{ $activity->kegiatan }}</p>
                                    </td>
                                   
                                    <td>
                                        <p>{{ date('Y-m-d', strtotime($activity->waktu)) }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $activity->tempat }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $activity->sasaran }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $activity->kegiatan }}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('kegiatan.show', $activity->id_kegiatan)}}" class="btn btn-outline-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('kegiatan.edit', $activity->id_kegiatan)}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="hapus('{{$activity->id_kegiatan}}')" class="btn btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $activities->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    function hapus(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch('kegiatan/'+id, {
                        headers: { "Content-Type": "application/json; charset=utf-8", "X-CSRF-TOKEN": token },
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(function(res) {
                        
                        if (res.status == 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            window.location = '{{url("kegiatan")}}'
                        }
                    })
                    
                }
            })
        }
</script>
@endsection