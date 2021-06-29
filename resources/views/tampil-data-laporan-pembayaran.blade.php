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
                                        <div class="col-9">
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                        </div>
                                                        <select class="form-control" id="pabrik" name="utipe">
                                                            <option default>Pabrik Tujuan</option>
                                                            @foreach ( $pg as $i )
                                                            <option value="{{ $i->nama_pg }}">{{ $i->nama_pg }}</option>
                                                            @endforeach
                                                        </select>
                                                        <select class="form-control" id="type" name="utipe">
                                                            <option default>Tipe</option>
                                                            <option value="SPT">SPT</option>
                                                            <option value="AMPERA">AMPERA</option>
                                                        </select>
                                                        <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('Y-m-d') ?> / <?= date('Y-m-d') ?>">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" id="filter" class="btn btn-secondary text-bold"><i class="fas fa-filter"></i>&nbsp;Cari</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6">
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
                                            <th>Invoice</th>
                                            <th>Harga</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Nominal</th>
                                            <th>Netto</th>
                                            <th>Pabrik Tujuan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list-data'>
                                        <?php if (count($list) === 0): ?>
                                        <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                                        <?php else: ?>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($list as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item['invoice'] }}</td>
                                            <td>
                                                <details>
                                                    <summary>List Tipe Tebu</summary>
                                                    <ol>
                                                        @foreach ($item['list_tipe'] as $data)
                                                        <li>{{ $data }}</li>
                                                        @endforeach
                                                    </ol>
                                                </details>
                                            </td>
                                            <td>{{ formatTanggal($item['tgl']) }}</td>
                                            <td>{{ formatRupiah($item['harga']) }}</td>
                                            <td>
                                                <details>
                                                    <summary>List Nama Petani</summary>
                                                    <ol>
                                                        @foreach ($item['list_pemilik'] as $data)
                                                        <li>{{ $data }}</li>
                                                        @endforeach
                                                    </ol>
                                                </details>
                                            </td>
                                            <td>{{ $item['petani'] }}</td>
                                            <td>{{ formatRupiah($item['sub_total']) }}</td>
                                            <td><a href="/pembayaran/{{ str_replace('/', '-', $item['invoice']) }}" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a></td>
                                        </tr>
                                        @endforeach
                                        <?php endif; ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="6"><b>Total</b></td>
                                            <td colspan="2">{{ formatrupiah(array_sum(array_column($list, 'sub_total'))) }}</td>
                                        </tr>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <script src="{{ asset('Js/LaporanPembayaran.js') }}"></script>
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
