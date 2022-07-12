@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Users') }}</h2>
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
                <div class="table-wrapper table-responsive">
                    <button type="button"class="btn btn-outline-success" onclick="tambah()">
                        <i class="fa fa-plus"></i> Tambah User
                    </button>
                    <table class="table striped-table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>Nama Lengkap</h6>
                                </th>
                                <th>
                                    <h6>Username</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Jabatan</h6>
                                </th>
                                <th>
                                    <h6>Aksi</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <p>{{ $user->nama_lengkap }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->username }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->level->nama_level }}</p>
                                    </td>
                                    <td>
                                        <button type="button"class="btn btn-outline-info"
                                            onclick="ubah('{{ $user->id_user }}')">
                                            <i class="fa fa-pencil-alt"></i>
                                        </button>
                                        <button type="button"class="btn btn-outline-warning"
                                            onclick="ubahPassword('{{ $user->id_user }}')">
                                            <i class="fa fa-key"></i>
                                        </button>
                                        <button type="button"class="btn btn-outline-danger"
                                            onclick="hapus('{{ $user->id_user }}')">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="btn-close" onclick="reset()"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="row">
                            <div id="changeData">
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                                            placeholder="{{ __('Nama Lengkap') }}">
                                        <small class="text-danger" id="msg_nama_lengkap"></small>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="username">{{ __('Username') }}</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="{{ __('Username') }}">
                                        <small class="text-danger" id="msg_username"></small class="text-danger">
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="{{ __('Email') }}">
                                        <small class="text-danger" id="msg_email"></small>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="id_level">{{ __('Jenis User') }}</label>
                                        <select name="id_level" class="form-control" id="id_level">
                                            @foreach ($levels as $item)
                                                <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger" id="msg_id_level"></small class="text-danger">
                                    </div>
                                </div>
                            </div>
                            <div id="changePassword">
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="{{ __('Password') }}">
                                        <small class="text-danger" id="msg_password"></small>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label for="password_confirmation">{{ __('Konfirmasi Password') }}</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="{{ __('Konfirmasi Password') }}">
                                        <small class="text-danger" id="msg_password_conformation"></small class="text-danger">
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="reset()" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpan()" id="submit">Save
                        changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

        let modalForm = new bootstrap.Modal(document.getElementById('modalForm'))
        let modalStatus = null;
        let modalTitle = document.getElementById('modalTitle')
        let changeData = document.getElementById('changeData')
        let changePassword = document.getElementById('changePassword')
        let submit = document.getElementById('submit')
        let form = document.getElementById('form')
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        let id_user = null
        let methodForm = null
        let resMessage = null

        function tambah() {

            modalStatus = 'tambah'
            modalTitle.innerHTML = 'Tambah Data'
            submit.innerHTML = 'Simpan'
            changeData.style.display = 'block';
            changePassword.style.display = 'block';

            modalForm.show()
        }

        function ubah(id) {

            modalStatus = 'ubah'
            modalTitle.innerHTML = 'Ubah Data'
            submit.innerHTML = 'Simpan perubahan'
            changeData.style.display = 'block';
            changePassword.style.display = 'none';
            id_user = id

            fetch('users/' + id)
                .then(response => response.json())
                .then(function(res) {
                    let data = res.data
                    form.nama_lengkap.value = data.nama_lengkap
                    form.username.value = data.username
                    form.email.value = data.email
                    form.id_level.value = data.id_level
                })

            modalForm.show()
        }

        function ubahPassword(id) {

            modalStatus = 'ubahPassword'
            modalTitle.innerHTML = 'Ubah Password'
            submit.innerHTML = 'Simpan perubahan'
            changeData.style.display = 'none';
            changePassword.style.display = 'block';
            id_user = id

            fetch('users/' + id)
                .then(response => response.json())
                .then(function(res) {
                    let data = res.data
                    form.nama_lengkap.value = data.nama_lengkap
                    form.username.value = data.username
                    form.email.value = data.email
                    form.id_level.value = data.id_level
                })

            modalForm.show()
        }

        function simpan() {

            if (modalStatus == 'tambah') {
                methodForm = 'POST'
                resMessage = 'Data berhasil ditambahkan !'
                urlForm = 'users'
            } else if(modalStatus == 'ubah'){
                methodForm = 'PUT'
                resMessage = 'Data berhasil diperbaharui !'
                urlForm = 'users/'+id_user
            }else{
                methodForm = 'PUT'
                resMessage = 'Data berhasil diperbaharui !'
                urlForm = 'users-password/'+id_user
            }

            fetch(urlForm, {
                headers: { "Content-Type": "application/json; charset=utf-8", "X-CSRF-TOKEN": token },
                method: methodForm,
                body: JSON.stringify({
                    nama_lengkap: form.nama_lengkap.value,
                    username: form.username.value,
                    email: form.email.value,
                    id_level: form.id_level.value,
                    password: form.password.value,
                    password_confirmation: form.password_confirmation.value,
                })
            })
            .then(response => response.json())
            .then(function(res) {

                resetMsg()
                let data = res.data
                
                if (res.status != 'success') {
                    const arr = Object.entries(data)
                    
                    arr.forEach((e,i) => {
                        let msg =  document.getElementById('msg_'+e[0])
                        msg.style.display = 'block'
                        msg.innerHTML = e[1][0]
                    });
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: resMessage,
                        timer: 1500
                    })

                    window.location = '{{url("users")}}'
                }
                
            })
        }

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

                    fetch('users/'+id, {
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

                            window.location = '{{url("users")}}'
                        }
                    })
                    
                }
            })
        }

        function reset() {

            modalForm.hide()

            form.nama_lengkap.value = null;
            form.username.value = null;
            form.email.value = null;
            form.id_level.value = 1;
            form.password.value = null;
            form.password_confirmation.value = null;

            resetMsg()

        }

        function resetMsg() {
            document.getElementById('msg_nama_lengkap').style.display = 'none';
            document.getElementById('msg_username').style.display = 'none';
            document.getElementById('msg_email').style.display = 'none';
            document.getElementById('msg_id_level').style.display = 'none';
            document.getElementById('msg_password').style.display = 'none';
        }

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
@endsection
