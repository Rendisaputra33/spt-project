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
                                                <div class="form-group">
                                                    <div
                                                         class="input-group">
                                                        <div
                                                             class="input-group-prepend">
                                                        </div>
                                                        <input type="text"
                                                               class="form-control float-right"
                                                               id="date-range"
                                                               name="date"
                                                               value="<?= date('Y-m-d') ?> / <?= date('Y-m-d') ?>">
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <div class="col-6">
                                                     <button type="button" id='filter' onClick="filter()"
                                                        class="btn btn-secondary text-bold"><i class="fas fa-filter"></i>&nbsp;Cari</button>
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
                                                     <th>Tgl Berangkat</th>
                                                     <th>Tgl Pulang</th>
                                                     <th>Tipe</th>
                                                     <th>Pemilik</th>
                                                     <th>Nama Petani</th>
                                                     <th>No Sp</th>
                                                     <th>No Truk</th>
                                                     <th>Tujuan</th>
                                                     <th>Netto Pulang</th>
                                                     <th>Harga</th>
                                                     <th>Sub Total</th>
                                                  </tr>
                                               </thead>
                                               <tbody id='list-data'>
                                              @if (count($data) === 0)
                                                  <td colspan="11" style="text-align: center;">DATA KOSONG</td>
                              @else
                                                  @foreach ($data as $item)
                                                  <tr>
                                                     <td>{{ $item['sub_total'] }}</td>
                                                     <td>{{ $item['invoice'] }}</td>
                                                     <td>
                                                        <select name="" id="">
                                                           @foreach ($item['list_petani'] as $data)
                                                           <option>{{ $data }}</option>
                                                           @endforeach
                                                        </select>
                                                  </tr>
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


                    <script src="{{ asset('Js/Pembayaran.js') }}"></script>
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script
                            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
                    </script>
                    <script
                            src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
                    </script>
                    <script
                            src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js">
                    </script>
                    <script type="text/javascript"
                            src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
                    </script>
                    <script type="text/javascript"
                            src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
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

{{-- <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
<td>{{ formatTanggal(date('Y-m-d', strtotime($item->created_at))) }}</td>
<td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
<td>{{ $item->netto }}</td>
<td>{{ $item->pabrik_tujuan }}</td>
<td>
   <a href="/pembayaran/{{ $item->id_pembayaran }}" class="btn btn-danger text-bold"><i
         class="far fa-trash-alt"></i>&nbsp;Hapus</a>
</td> --}}
