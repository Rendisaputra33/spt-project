<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Invoice</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <section class="invoice">
                <!-- title row -->
                <div id="cetak">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> RAYA GUNA
                                <p class="pull-right" style="font-size: 23px">Date: {{ formatTanggal(date('Y-m-d')) }}</p>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <h5><b>#Laporan Berangkat</b></h5>
                        </div>
                        <!-- /.col -->
                    </div> <br>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Berangkat</th>
                                        <th>No SP</th>
                                        <th>Nama Pemilik</th>
                                        <th>Nama Petani</th>
                                        <th>Pabrik Tujuan</th>
                                        <th>No Induk</th>
                                        <th>Wilayah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @php $no = 1; @endphp
                                    @foreach ($data as $item)
                                        @php $total += $item->harga * $item->netto @endphp
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ formatTanggal($item->tanggal_keberangkatan) }}</td>
                                            <td>{{ $item->no_sp }}</td>
                                            <td>{{ $item->nama_petani }}</td>
                                            <td>{{$item->nama_sopir}}</td>
                                            <td>{{ $item->pabrik_tujuan }}</td>
                                            <td>{{ $item->no_induk }}</td>
                                            <td>{{ $item->wilayah }}</td>
                                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div><br>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->

                        <!-- /.col -->
                        <div class="col-xs-8">

                        </div>
                        {{-- <div class="col-xs-3">

                        </div> --}}
                        {{-- <div class="col-xs-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Total:</th>
                                            <td style="text-align: right">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a id="button" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                        <a href="/berangkat" id="button" class="btn btn-default"><i class="fa fa-print"></i>Kembali</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

<script>
    const tombol = document.getElementById('button')
    const documen = document.getElementById('cetak')

    tombol.addEventListener('click', () => {
        var restorepage = document.body.innerHTML
        var printcontent = documen.innerHTML
        document.body.innerHTML = printcontent
        window.print()
        document.body.innerHTML = restorepage
    })
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

</html>
