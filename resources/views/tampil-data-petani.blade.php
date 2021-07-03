@extends('templates.template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
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
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <form>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            </div>
                                                            <input type="text" class="form-control float-right" id="search" name="date" value="">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary text-bold"><i class="fas fa-search"></i>&nbsp;Cari</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="/petani/view/add" class="btn btn-success float-right text-bold"><i class="fas fa-plus"></i>&nbsp;Tambah</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tb" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemilik</th>
                                            <th>No Induk</th>
                                            <th>Nama Pabrik</th>
                                            <th>Tanggal Edit</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody id="list-data">
                                        @if (count($petani) === 0)
                                            <td colspan="6" style="text-align: center">DATA KOSONG</td>
                                        @else
                                            <?php $no = 1; ?>
                                            @foreach ($petani as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->nama_pemilik }}</td>
                                                    <td>{{ $item->register_pemilik }}</td>
                                                    <td>{{ $item->nama_pabrik }}</td>
                                                    <td>{{ formatTanggal(date('Y-m-d', strtotime($item->created_at))) }}</td>
                                                    <td style="text-align: center;">

                                                        <a href="#" class="btn btn-success text-bold update" data-target="#modal-lg" data-toggle="modal" data-id="{{ $item->id_pemilik }}"><i class="fas fa-pencil-alt"></i>&nbsp;Ubah</a>
                                                        <form action="{{ url('/') }}/petani/{{ $item->id_pemilik }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
                                <h4 class="modal-title">UBAH DATA PETANI</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="" id="form-update">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pemilik</label>
                                        <input type="text" class="form-control" placeholder="Nama " name="nama_petani">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Register Pemilik</label>
                                        <input type="text" class="form-control" placeholder="Register " name="register_petani">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pabrik</label>
                                        <input type="text" class="form-control" placeholder="Nama Pabrik " name="nama_pabrik">
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

                <!-- COBA PANGGIL DATA MSQL -->
                <div class="row">
                    <!-- ISI -->
                </div>

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <script src="{{ asset('Js/Petani.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('Js/Pagination.js') }}"></script>
@endsection
