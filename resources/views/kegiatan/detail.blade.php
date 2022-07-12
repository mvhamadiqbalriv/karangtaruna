@extends('layouts.app')
@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Detail Kegiatan') }}</h2>
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
                <dl class="row">
                    <dt class="col-sm-3">Judul</dt>
                    <dd class="col-sm-9">{{$show->kegiatan}}</dd>
                  
                    <dt class="col-sm-3">Waktu</dt>
                    <dd class="col-sm-9">{{date('Y-m-d', strtotime($show->waktu))}}</dd>
                  
                    <dt class="col-sm-3">Tempat</dt>
                    <dd class="col-sm-9">{{$show->tempat}}</dd>
                  
                    <dt class="col-sm-3 text-truncate">Sasaran</dt>
                    <dd class="col-sm-9">{{$show->sasaran}}</dd>
                  
                    <dt class="col-sm-3">Keterangan</dt>
                    <dd class="col-sm-9">{{$show->keterangan}}
                    </dd>
                  </dl>
                  <div class="table-wrapper table-responsive">
                    <a href="{{route('kegiatan-foto.create', ['id_kegiatan' => $show->id_kegiatan])}}" class="btn btn-outline-success">
                        <i class="fa fa-plus"></i> Tambah Foto
                    </a>
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Deskripsi</h6>
                                </th>
                                <th>
                                    <h6>Foto</h6>
                                </th>
                                <th>
                                    <h6>Tanggal</h6>
                                </th>
                                <th>
                                    <h6>Aksi</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($fotos as $foto)
                                <tr>
                                    <td>
                                        <p>{{ $foto->deskripsi }}</p>
                                    </td>
                                   <td>
                                        <img src="{{Storage::url($foto->foto)}}" width="200" height="200" style="object-fit: contain;border-radius: 20px;" alt="">
                                   </td>
                                    <td>
                                        <p>{{ date('Y-m-d', strtotime($foto->tanggal)) }}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('kegiatan-foto.edit', $foto->id_foto)}}?id_kegiatan={{$show->id_kegiatan}}" class="btn btn-outline-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="hapus('{{$foto->id_foto}}')" class="btn btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $fotos->links() }}
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

                    fetch('{{url("kegiatan-foto")}}/'+id, {
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

                            window.location.reload()
                        }
                    }).catch((error) => {
                        console.error('Error:', error);
                    })
                    
                }
            })
        }
</script>
@endsection