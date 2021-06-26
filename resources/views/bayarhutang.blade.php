@extends('templates.template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" id="judul"></h1>
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
                            <h3 class="card-title">Pembayaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mt-2 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-1.8 ml-2 mt-2 mr-3">
                                                <span style="font-weight: bold;">Nama Sopir :</span>
                                            </div>
                                            <div class="col-2">
                                                <select name="nama_sopir" id="nama_sopir"
                                                    class="form-control select2bs4">
                                                    <option selected="selected">Pilih Sopir</option>
                                                    <option value=""></option>
                                                </select>
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
                                        <th>Sopir</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="#" class="btn btn-success text-white bayar" style="margin: center;"
                                                data-target="#modal-lg-cicil" data-toggle="modal"><i
                                                    class=" fas fa-plus-circle"></i> Bayar</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <?php $no = 0; ?>
            <div class="modal fade" id="modal-lg-cicil">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Masukkan Nominal Cicilan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group" style="display: none;">
                                <label for=" nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="kode_hutang" value="" autocomplete="off">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="keterangan" value="" autocomplete="off">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="kode_supir" value="" autocomplete="off">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="status_hutang" value=""
                                    autocomplete="off">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="jenis" value="pembayaran_hutang"
                                    autocomplete="off">
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="nominal_awal" value="" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="nama_barang" class="col-form-label">Nominal</label>
                                <input type="text" class="form-control" name="nominal"
                                    data-inputmask="'alias': 'currency' " data-mask>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

                                <button type="submit" name="btnSubmit" class="btn btn-primary swalDefaultSuccess"><i
                                        class="fa fa-spinner fa-spin loading" style="display:none"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
</div>

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
    $(document).ready(function() {

            $('[data-mask]').inputmask("currency", {
                prefix: " Rp. ",
                digitsOptional: true
            })

            function filterData() {
                $('#tabel_pemasukan').DataTable().search(
                    $('.select2bs4').val()
                ).draw();
            }

            $('.select2bs4').on('change', function() {
                var slct = $("#nama_sopir option:selected").html();
                if (slct == "Pilih Sopir") {
                    $('#tabel_pemasukan').DataTable().search(
                        ''
                    ).draw();
                } else {
                    filterData();
                }
            });

            $(function() {
                $('.select2bs4').select2({
                    theme: 'bootstrap4',
                    placeholder: "change your placeholder"
                })
            });
        });
</script>
@endsection
