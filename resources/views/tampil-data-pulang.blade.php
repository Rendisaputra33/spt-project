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
                                        <div class="col-4">
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('m/d/Y') ?> - <?= date('m/d/Y') ?>">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" id='filter' class="btn btn-secondary text-bold"><i class="fas fa-filter"></i>&nbsp;Cari</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="/pulang/view/cetak" class="btn btn-secondary float-right text-bold ml-1"><i class="fas fa-print"></i>&nbsp;Cetak Laporan</a>
                                    <a href="/pulang/view/list" class="btn btn-secondary float-right text-bold"><i class="fas fa-plus"></i>&nbsp;Tambah</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel_pemasukan" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pulang</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Pemilik</th>
                                            <th>No SP</th>
                                            <th>No Truk</th>
                                            <th>Petani</th>
                                            <th>Berat Bersih (Ku)</th>
                                            <th>Harga</th>
                                            <th>Sub Total</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list-data'>
                                        @if (count($data) === 0)
                                        <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                                        @else
                                        <?php $no = 1; ?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ formatTanggal($item->tanggal_pulang) }}</td>
                                            <td>{{ formatTanggal($item->tanggal_keberangkatan) }}</td>
                                            <td>{{ $item->nama_petani }}</td>
                                            <td>{{ $item->no_sp }}</td>
                                            <td>{{ $item->no_truk }}</td>
                                            <td>{{ $item->nama_sopir }}</td>
                                            <td>{{ $item->netto_pulang }}</td>
                                            <td>{{ formatRupiah($item->harga) }}</td>
                                            <td>{{ formatRupiah($item->netto_pulang * $item->harga) }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary text-bold detail" id="detail" data-target="#modal-lg-2" data-toggle="modal" data-id="{{ $item->id_keberangkatan }}"><i class="fas fa-info-circle"></i>&nbsp;Detail</button>
                                                <button type="button" class="btn btn-success text-bold update" data-target="#modal-lg" data-toggle="modal" data-id="{{ $item->id_keberangkatan }}"><i class="fas fa-pencil-alt"></i>&nbsp;Ubah</button>
                                                <a href="/pulang/{{ $item->id_keberangkatan }}" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </table>
                            </div>

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

<!-- Modal -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPDATE DATA KEPULANGAN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="" id="form-update">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pulang</label>
                        <input type="date" class="form-control" placeholder="Tanggal Pulang " name="tanggal_pulang">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Bongkar</label>
                        <input type="date" class="form-control" placeholder="Tanggal Bongkar " name="tanggal_bongkar">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Truk</label>
                        <input type="text" class="form-control" placeholder="No Truk " name="no_truk">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Berat Pulang</label>
                        <input type="text" class="form-control" placeholder="Berat Pulang " name="berat_pulang">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Refaksi</label>
                        <input type="text" class="form-control" placeholder="Refaksi " name="refaksi">
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
<div class="modal fade" id="modal-lg-2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DETAIL DATA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table id="tabel_pemasukan" class="table table-borderless mt-3" style=" display: flex; flex-direction: row; justify-content: space-evenly;">
                <thead>
                    <tr class="col-sm" style="display: flex; flex-direction: column;">
                        <th>Tanggal Keberangkatan</th>
                        <th>Tipe</th>
                        <th>No SP</th>
                        <th>No Induk</th>
                        <th>Wilayah</th>
                        <th>Nama Petani</th>
                        <th>Pemilik</th>
                        <th>Tujuan</th>
                        <th>Berat Pulang</th>
                    </tr>
                </thead>
                <tr class="col-sm" style="display: flex; flex-direction: column;">
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                </tr>
                <tbody id="detail1">
                    <tr class="col-sm" style="display: flex; flex-direction: column;">
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                    </tr>
                </tbody>
                <thead>
                    <tr class="col-sm" style="display: flex; flex-direction: column;">
                        <th>No Induk</th>
                        <th>Wilayah</th>
                        <th>Nama Petani</th>
                        <th>Pemilik</th>
                        <th>Tujuan</th>
                        <th>Berat Pulang</th>
                        <th>Netto</th>
                        <th>Harga</th>
                        <th>Tanggal Pulang</th>
                    </tr>
                </thead>
                <tr class="col-sm" style="display: flex; flex-direction: column;">
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                    <td>:</td>
                </tr>
                <tbody id="detail2">
                    <tr class="col-sm" style="display: flex; flex-direction: column;">
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /Modal -->

<script src="{{ asset('Js/GlobalPulang.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('#date-range').daterangepicker({
                        locale: {
                            format: 'YYYY-MM-DD',
                            separator: " / "
                        }
                    });
</script>
@endsection
