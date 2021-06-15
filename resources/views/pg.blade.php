@extends('templates.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data User</h1>
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
                    <!-- general form elements -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Isi Form Data PG</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="" method="POST">
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama PG</label>
                                    <input type="text" class="form-control" placeholder="Nama " name="nama_pg">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Lokasi PG</label>
                                    <input type="text" class="form-control" placeholder="Lokasi " name="lokasi_pg">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tanggal Data PG Di Input</label>
                                    <input type="text" class="form-control" placeholder="Tanggal" name="date_add">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

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
@endsection