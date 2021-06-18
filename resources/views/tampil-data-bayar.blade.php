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
                                        <a href="#" class="btn btn-success float-right text-bold">Tambah &nbsp;<i class="fas fa-plus"></i> </a>
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
                                                <th>Id Keberangkatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>17</td>
                                                <td>177013</td>
                                                <td>69k</td>
                                                <td>1-1-1999</td>
                                                <td>69</td>
                                                <td>69gr</td>
                                                <td>6969</td>
                                            </tr>
                                            {{-- @if (count($data) === 0)
                                                <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                                            @else
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
                                                        <td>{{ $item->harga }}</td>
                                                        <td>{{ $item->tanggal_keberangkatan }}</td>
                                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"> Edit</button>&nbsp;
                                                            <button type="button" class="btn btn-success">Pulang</button>&nbsp;
                                                            <button type="button" class="btn btn-danger">Hapus</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif --}}
                                    </table>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                {{-- <!-- modal untuk tambah data -->
                <form action=" " method="post">
                    <div class="modal fade" id="modal-lg-tambah">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Berangkat</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Berangkat " name="tanggal_berangkat" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Tipe</label>
                                        </div>
                                        <select name="tipe" class="custom-select" id="tipe">
                                            <option selected>Choose...</option>
                                            <option value="SPT">SPT</option>
                                            <option value="AMPERA">AMPERA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No SP</label>
                                        <input type="text" class="form-control" placeholder="No SP " name="no_sp" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Induk</label>
                                        <input type="text" class="form-control" placeholder="No Induk " name="no_induk" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Wilayah</label>
                                                </div>
                                                <select name="wilayah" class="custom-select" id="wilayah">
                                                    <option selected>Choose...</option>
                                                    <option value="">Wilayah 1</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Nama Petani</label>
                                                </div>
                                                <select name="nama_petani" class="custom-select" id="nama_petani">
                                                    <option selected>Choose...</option>
                                                        <option value="">Eko</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Nama Sopir</label>
                                                </div>
                                                <select name="nama_sopir" class="custom-select" id="nama_sopir">
                                                    <option selected>Choose...</option>
                                                        <option value="">Suhardi</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Nama Pabrik</label>
                                                </div>
                                                <select name="nama_pabrik" class="custom-select" id="nama_pabrik">
                                                    <option selected>Choose...</option>
                                                        <option value="">Mulya utomo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sangu</label>
                                        <input type="text" class="form-control" placeholder="Sangu " name="sangu" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Berat Timbang</label>
                                        <input type="text" class="form-control" placeholder="Berat Timbang " name="berat_timbang" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tara MBL</label>
                                        <input type="text" class="form-control" placeholder="Tara MBL " name="tara_mbl" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Netto</label>
                                        <input type="text" class="form-control" placeholder="Netto " name="netto" required>
                                        <span class="text-dark"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga</label>
                                        <input type="text" class="form-control" placeholder="Harga " name="harga" required>
                                        <span class="text-dark"></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
            </div>
            </form> --}}

            <!-- modal untuk edit data -->
            <form action="" method="post">
                <div class="modal fade" id="">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data Barang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_barang" value="">

                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
    <!-- /Modal -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
@endsection
