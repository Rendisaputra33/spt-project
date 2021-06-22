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
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <i class="fa fa-globe"></i> INFORMENT
                      <small class="pull-right">Date: 2/10/2014</small>
                    </h2>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Dari
                    <address>
                      <strong>Admin, Inc.</strong><br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Untuk
                    <address>
                      <strong>John Doe</strong><br>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          
                <!-- Table row -->
                <div class="row">
                  <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Harga</th>
                        <th>Tanggal Bayar</th>
                        <th>Nominal</th>
                        <th>Netto</th>
                        <th>Id Kebrangkatan</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>750.000</td>
                        <td>Call of Duty</td>
                        <td>177013</td>
                        <td>300gr</td>
                        <td>69</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          
                <div class="row">
                  <!-- accepted payments column -->
                  
                  <!-- /.col -->
                  <div class="col-xs-12">
                    <p class="lead">Amount Due 2/22/2014</p>
          
                    <div class="table-responsive">
                      <table class="table">
                        <tbody><tr>
                          <th style="width:25%">Subtotal:</th>
                          <td style="text-align: right">$250.30</td>
                          <th>Shipping:</th>
                          <td style="text-align: right">$5.80</td>
                        </tr>
                        <tr>
                          <th>Tax (9.3%)</th>
                          <td style="text-align: right">$10.34</td>
                          <th>Total:</th>
                          <td style="text-align: right">$265.24</td>
                        </tr>
                      </tbody></table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
          
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-xs-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                      <i class="fa fa-download"></i> Generate PDF
                    </button>
                  </div>
                </div>
              </section>
        </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</html>
