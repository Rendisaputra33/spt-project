@extends('templates.template')
@section("content")
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Judul</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pengambilan Hutang</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
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
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('m/d/Y') ?> - <?= date('m/d/Y') ?>">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-info">Cari</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-success float-right text-bold" data-target="#modal-lg" data-toggle="modal">Ambil Hutang &nbsp;<i class="fas fa-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <!-- <th>Kode Hutang</th> -->
                                        <th>Sopir</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                        <tr>
                                            <td></td>
                                            <!-- <td></td> -->
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td> -->
                                        </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th><?= "Rp. " . number_format($total, 0, ',', '.') ?></th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </tfoot>
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
                            <h4 class="modal-title">Ambil Hutang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Sopir</label>
                                    <select name="sopir" id="sopir" class="form-control">
                                            <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Nominal</label>
                                    <input type="text" class="form-control" name="nominal" data-inputmask="'alias': 'currency' " data-mask>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                    <button type="submit" name="btnSubmit" class="btn btn-primary"><i class="fa fa-spinner fa-spin loading" style="display:none"></i> Simpan</button>
                                </div>
                            </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    $(function() {

        $('[data-mask]').inputmask("currency", {
            prefix: " Rp. ",
            digitsOptional: true
        })
@endsection