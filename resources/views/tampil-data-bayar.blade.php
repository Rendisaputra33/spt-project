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
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-info">Cari</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="/pembayaran/view/list" class="btn btn-success float-right text-bold">Tambah &nbsp;<i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel_pemasukan" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Id Pembayaran</th>
                                                <th>Invoice</th>
                                                <th>Harga</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Nominal</th>
                                                <th>Netto</th>
                                                <th>Pabrik Tujuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($data) === 0)
                                                <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                                            @else
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $item->tipe }}</td>
                                                        <td>{{ $item->no_invoice }}</td>
                                                        <td>{{ $item->harga }}</td>
                                                        <td>{{ $item->tanggal_bayar }}</td>
                                                        <td>{{ $item->nominal }}</td>
                                                        <td>{{ $item->netto }}</td>
                                                        <td>{{ $item->pabrik_tujuan }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"> Edit</button>&nbsp;
                                                            <a href="/pembayaran/{{ $item->id_pembayaran }}" class="btn btn-danger">Hapus</a>
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
            </div>
        </section>
    </div>
    <!-- /Modal -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
@endsection