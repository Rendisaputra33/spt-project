@extends('templates.template')
@section('css-list')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection
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
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="date-range" name="date" value="<?= date('Y-m-d') ?> / <?= date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" id='filter' onClick="filter()" class="btn btn-secondary text-bold"><i class="fas fa-filter"></i>&nbsp;Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="/pembayaran/view/list" class="btn btn-secondary float-right text-bold">Tambah
                                        &nbsp;<i class="fas fa-plus"></i> </a>
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
                                            <th>Invoice</th>
                                            <th>Tipe</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Harga</th>
                                            <th>Nama Petani</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id='list-data'>
                                        <?php if (count($data) === 0): ?>
                                        <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                                        <?php else: ?>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($data as $item)
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
                                                        @foreach ($item['list_petani'] as $data)
                                                        <li>{{ $data }}</li>
                                                        @endforeach
                                                    </ol>
                                                </details>
                                            </td>
                                            <td>{{ formatRupiah($item['sub_total']) }}</td>
                                            <td><a href="/pembayaran/{{ str_replace('/', '-', $item['invoice']) }}" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a></td>
                                        </tr>
                                        @endforeach
                                        <?php endif; ?>
                                        <tr>
                                            <td colspan="6"><b>Total</b></td>
                                            <td colspan="2">Rp. 5.000.000</td>
                                        </tr>
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
        </div>
    </section>
</div>
<!-- /Modal -->


<script src="{{ asset('Js/Pembayaran.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js">
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
</script>
<script>
    $('#date-range').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
                separator: " / "
            }
        });
</script>
@endsection

{{-- <!-- <a href="/pembayaran/{{ $item->id_pembayaran }}" class="btn btn-danger text-bold"><i class="far fa-trash-alt"></i>&nbsp;Hapus</a> --> --}}
