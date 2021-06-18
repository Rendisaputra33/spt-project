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
                        <li class="breadcrumb-item"><a href="/laporan-hutang">Laporan Hutang</a></li>
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
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-info btn-block swalDefaultSuccess">Cari</button>
                                            </div>
                                            <div class="col-2">
                                                <!-- <a href="" class="btn btn-success cetakData">Cetak Data</a> -->
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>Tanggal</th> -->
                                        <th>Nama Sopir</th>
                                        <!-- <th>Keterangan</th>
                                        <th>Jenis</th> -->
                                        <th>Sisa Hutang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><button type="button" class="btn btn-info text-bold" data-toggle="modal" data-target="#exampleModal">
                                                Detail&nbsp;<i class="fas fa-info-circle"></i>
                                              </button></a></td>
                                        </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-bold">Total</th>
                                        <th class="text-bold"></th>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="tglberangkat">Tanggal Berangkat</label>
                        <input type="text" name="tanggal_berangkat" class="form-control" id="tglberangkat" placeholder="Tanggal berangkat">
                    </div>
                  </form>
              <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                          <label for="tipe">Tipe</label>
                          <select class="form-control" id="tipe" name="tipe">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nosp">No Sp</label>
                          <input type="text" name="no_sp" class="form-control" id="nosp" placeholder="No Sp">
                        </div>
                        <div class="form-group">
                          <label for="noinduk">No Induk</label>
                          <input type="text" name="no_induk" class="form-control" id="noinduk" placeholder="No Induk">
                        </div>
                        <div class="form-group">
                          <label for="wilayah">Wilayah</label>
                          <select class="form-control" id="wilayah" name="wilayah">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="namapetani">Nama Petani</label>
                          <select class="form-control" id="namapetani" name="nama_petani">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="namasopir">Nama Sopir</label>
                          <select class="form-control" id="namasopir" name="nama_sopir">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                          </select>
                        </div>
                      </form>
                </div>
                <div class="col-md-6 ml-auto">
                    <form action="">
                        <div class="form-group">
                          <label for="pabriktujuan">Pabrik Tujuan</label>
                          <select class="form-control" id="pabriktujuan" name="pabrik_tujuan">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sangu">Sangu</label>
                          <input type="text" name="sangu" class="form-control" id="sangu" placeholder="Sangu">
                        </div>
                        <div class="form-group">
                          <label for="berattimbang">Berat Timbang</label>
                          <input type="text" name="berat_timbang" class="form-control" id="berattimbang" placeholder="Berat Timbang">
                        </div>
                        <div class="form-group">
                          <label for="tarambl">Tara mbl</label>
                          <input type="text" name="tara_mbl" class="form-control" id="tarambl" placeholder="Tara mbl">
                        </div>
                        <div class="form-group">
                          <label for="netto">Netto</label>
                          <input type="text" name="netto" class="form-control" id="netto" placeholder="Netto">
                        </div>
                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                        </div>

                    </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info">Simpan</button>
            </div>
          </div>
      </div>
    </div>
  </div>


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