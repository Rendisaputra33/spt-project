@extends('templates.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div id="flash-data-success" data-flash-success="{{ session('sukses') }}"></div>
            <div id="flash-data-error" data-flash-error="{{ session('error') }}"></div>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="/transaksi/berangkat/cetak" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-success text-bold float-right" data-target="#modal-lg" data-toggle="modal" data-id=""><i class="fas fa-plus"></i>&nbsp;Tambah</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tb" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Nama User</th>
                                                <th>Username</th>
                                                <th style="width: 10%">Level</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="width: 15%; text-align: center;">
                                                        <a href="#" class="btn btn-warning text-bold" data-target="#modal-edit" data-toggle="modal" data-id=""><i class="fas fa-pencil-alt"></i>&nbsp;Ubah</a>
                                                        <a href="" class="btn btn-danger text-bold delete"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">TAMBAH USER</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="" id="form-update">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama User</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama_user" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" placeholder="Password" name="password" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Super Admin</option>
                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="modal fade" id="modal-edit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">EDIT USER</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="" id="form-update">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama User</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama_user" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" placeholder="Password" name="password" required>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">Super Admin</option>
                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <script src="{{ asset('Js/LaporanTransaksi.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <script src="{{ asset('Js/Range.js') }}"></script>
            <script src="{{ asset('Js/Pagination.js') }}"></script>
        @endsection
