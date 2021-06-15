@extends('templates.template')
@section("content")
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
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
                            <h3 class="card-title">Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
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
                                            <div class="col-2">
                                                <select name="jenis" id="jenis" class="form-control jenis" data-placeholder="Semua Bank">
                                                    <option value="semua"> Semua</option>
                                                    <option value="servis_jasa"> Servis & Jasa</option>
                                                    <option value="suku_cadang"> Suku Cadang</option>
                                                    <option value="operasional"> Operasional Keberangkatan</option>
                                                    <option value="pemasukan"> Pemasukan</option>
                                                    <option value="pengeluaran"> Pengeluaran</option>

                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-info btn-block swalDefaultSuccess">Cari</button>
                                            </div>

                                                
                                            </select>
                                            <div class="col-2">
                                                <a href="/cetak" class="btn btn-success cetakData">Cetak Data</a>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jenis</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>-</td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="3">JUMLAH</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">SALDO AKHIR</th>
                                        <th colspan="2" style="text-align: center;"></th>
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

        // $(".cetakData").click(function() {
        //     var id = $(this).parents("tr").attr("id");

        //     swal({
        //             title: "Are you sure?",
        //             text: "You will not be able to recover this imaginary file!",
        //             type: "success",
        //             showCancelButton: true,
        //             confirmButtonClass: "btn-danger",
        //             confirmButtonText: "Yes, delete it!",
        //             cancelButtonText: "No, cancel plx!",
        //             closeOnConfirm: false,
        //             closeOnCancel: false
        //         },
        //         function(isConfirm) {
        //             if (isConfirm) {
        //                 $.ajax({
        //                     url: '/item-list/' + id,
        //                     type: 'DELETE',
        //                     error: function() {
        //                         alert('Something is wrong');
        //                     },
        //                     success: function(data) {
        //                         $("#" + id).remove();
        //                         swal("Deleted!", "Your imaginary file has been deleted.", "success");
        //                     }
        //                 });
        //             } else {
        //                 swal("Cancelled", "Your imaginary file is safe :)", "error");
        //             }
        //         });

        // });
    });
</script>
@endsection