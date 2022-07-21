@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Berita') }}</h2>
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
                    @if (Auth::user()->level->nama_level == 'Pengurus')
                        <a href="{{route('berita.create')}}" class="btn btn-outline-success">
                            <i class="fa fa-plus"></i> Tambah Berita
                        </a>
                    @endif
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Thumbnail</h6>
                                </th>
                                <th>
                                    <h6>Judul</h6>
                                </th>
                                <th>
                                    <h6>Waktu</h6>
                                </th>
                                <th>
                                    <h6>Isi</h6>
                                </th>
                                @if (Auth::user()->level->nama_level == 'Pengurus')
                                    <th>
                                        <h6>Aksi</h6>
                                    </th>
                                @endif
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <td>
                                        <img src="{{Storage::url($new->berita_image)}}" width="150" height="150" style="object-fit: contain; border-radius:20px" alt="">
                                    </td>
                                    <td>
                                        <p>{{ $new->berita_judul }}</p>
                                    </td>
                                    <td>
                                        <p>{{ date('Y-m-d', strtotime($new->berita_tanggal)) }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $new->berita_isi }}</p>
                                    </td>
                                    @if (Auth::user()->level->nama_level == 'Pengurus')
                                        <td>
                                            <a href="{{route('berita.edit', $new->berita_id)}}" class="btn btn-outline-info">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="hapus('{{$new->berita_id}}')" class="btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $news->links() }}
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

                    fetch('berita/'+id, {
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

                            window.location = '{{url("berita")}}'
                        }
                    })
                    
                }
            })
        }
</script>
@endsection