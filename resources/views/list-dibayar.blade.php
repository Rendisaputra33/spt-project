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
        <form action="/pembayaran/chekout" method="post">
            @csrf
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
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            </div>
                                                            <input type="text" class="form-control float-right" id="search" name="date" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary text-bold"><i class="fas fa-filter"></i>&nbsp;Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-secondary float-right text-bold"><i class="fas fa-money-bill-wave"></i>&nbsp;Bayar</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tabel_pemasukan" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal Pulang</th>
                                                <th>Tipe</th>
                                                <th>Nama Pemilik</th>
                                                <th>Nama Petani</th>
                                                <th>Tujuan</th>
                                                <th>Tanggal Berangkat</th>
                                                <th>Refaksi</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-data">
                                            @if (count($data) === 0)
                                                <td colspan="9" style="text-align: center;">DATA KOSONG</td>
                                            @else
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td><input type="checkbox" name="id[]" value="{{ $item->id_keberangkatan }}" /></td>
                                                        <td>{{ formatTanggal(date('Y-m-d', strtotime($item->tanggal_pulang))) }}</td>
                                                        <td>{{ $item->tipe }}</td>
                                                        <td>{{ $item->nama_petani }}</td>
                                                        <td>{{ $item->nama_sopir }}</td>
                                                        <td>{{ $item->pabrik_tujuan }}</td>
                                                        <td>{{ formatTanggal(date('Y-m-d', strtotime($item->tanggal_keberangkatan))) }}</td>
                                                        <td>{{ $item->refaksi }}</td>
                                                        <td>Rp {{ number_format($item->harga * $item->netto, 0, ',', '.') }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
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
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </form>
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
@endsection
