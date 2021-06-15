@extends('templates.template')
@section("content")
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h2></h2>
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/laporan-hutang">Laporan Hutang</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
                            <h3 class="card-title">Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <!-- <form action="" method="POST">
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
                                            </div> -->
                                                <!-- <div class="col-2">
                                                <select name="jenis" id="jenis" class="form-control jenis" data-placeholder="Semua Bank">
                                                    <option value="semua"> Semua</option>
                                                    <option value="servis_jasa"> Servis & Jasa</option>
                                                    <option value="suku_cadang"> Suku Cadang</option>
                                                    <option value="operasional"> Operasional Keberangkatan</option>
                                                    <option value="pemasukan"> Pemasukan</option>
                                                    <option value="pengeluaran"> Pengeluaran</option>

                                                </select>
                                            </div> -->
                                                <!-- <div class="col-1">
                                                <button type="submit" class="btn btn-info btn-block swalDefaultSuccess">Cari</button>
                                            </div>
                                            <div class="col-2"> -->
                                                <!-- <a href="" class="btn btn-success cetakData">Cetak Data</a> -->
                                                <!-- </div>
                                            </form> -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Sisa Hutang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="/rincian-pembayaran" class="btn btn-info text-bold">Rincian Pembayaran &nbsp;<i class="fas fa-info-circle"></i></a></td>
                                            </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-bold" colspan="2">Total</th>
                                            <th class="text-bold"><?= "Rp. " . number_format($total, 0, ',', '.') ?></th>
                                            <th class="text-bold"></th>
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

                <!-- COBA PANGGIL DATA MSQL -->
                <div class="row">
                    <!-- ISI -->
                </div>

            </div>

            <div class="modal fade" id="modal-lg-tambah">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Pengeluaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="nama_barang" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang" class="col-form-label">Nominal</label>
                                    <input type="text" class="form-control" name="nominal" autocomplete="off">
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
    // $(document).ready(function() {
    //     $('#tabelData').DataTable();

    //     function filterData() {
    //         $('#tabelData').DataTable().search(
    //             $('.jenis_kelamin').val()
    //         ).draw();
    //     }
    //     $('.jenis_kelamin').on('change', function() {}
    //         filterData();
    //     });
    // });

    $(function() {
        $('.swalDefaultSuccess').click(function() {
            $('#tabel_pemasukan').DataTable().search(
                $('.jenis_kelamin').val()
            ).draw();
        });
    });
</script>
@endsection