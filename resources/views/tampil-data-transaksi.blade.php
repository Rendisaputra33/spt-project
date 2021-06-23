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
                                                            <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('Y-m-d') ?> / <?= date('Y-m-d') ?>">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-info">Cari</button>
                                                <button type="button" id='filter' onClick="filter()" class="btn btn-info text-bold"><i
                                                class="fas fa-filter"></i>&nbsp;FILTER</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="btn btn-success float-right text-bold" data-target="#modal-lg-tambah" data-toggle="modal">Tambah &nbsp;<i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel_pemasukan" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Tipe</th>
                                                <th>No SP</th>
                                                <th>Wilayah</th>
                                                <th>Pemilik</th>
                                                <th>Petani</th>
                                                <th>Tujuan</th>
                                                <th>Berat (Kwintal)</th>
                                                <th>Netto</th>
                                                <th>Harga</th>
                                                <th>Tanggal</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->tipe }}</td>
                                                    <td>{{ $item->no_sp }}</td>
                                                    <td>{{ $item->wilayah }}</td>
                                                    <td>{{ $item->nama_petani }}</td>
                                                    <td>{{ $item->nama_sopir }}</td>
                                                    <td>{{ $item->pabrik_tujuan }}</td>
                                                    <td>{{ $item->berat_timbang }}</td>
                                                    <td>{{ $item->netto }}</td>
                                                    <td>{{ formatRupiah($item->harga) }}</td>
                                                    <td>{{ formatTanggal($item->tanggal_keberangkatan) }}</td>
                                                    <td><a href="/transaksi/berangkat/cetak/{{ $item->id_keberangkatan }}" class="btn btn-success">cetak</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
            @endsection
