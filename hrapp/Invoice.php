<?php
// Get the parameters from the URL
$date = isset($_GET['date']) ? $_GET['date'] : '';
$basicSalary = isset($_GET['basicsalary']) ? $_GET['basicsalary'] : '';
$allowance = isset($_GET['allowance']) ? $_GET['allowance'] : '';
$totalAmount = isset($_GET['total']) ? $_GET['total'] : '';
?>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR OMNITRACK</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="http://localhost/hrapp/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://localhost/hrapp/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="http://localhost/hrapp/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/hrapp/assets/dist/css/AdminLTE.min.css">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body onload="window.print();">
  <div class="wrapper">
        <!-- Main content -->
      <section class="invoice" id="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
            ######
              <small class="pull-right">Date:<?php echo $date; ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Basic Salary</th>
                <th>Allowance</th>
                <th>Subtotal</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>₹<?php echo $basicSalary; ?></td>
                  <td>₹<?php echo $allowance; ?></td>
                  <td>₹<?php echo $totalAmount; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="http://localhost/EMS-CI/assets/dist/img/credit/visa.png" alt="Visa">
            <img src="http://localhost/EMS-CI/assets/dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="http://localhost/EMS-CI/assets/dist/img/credit/american-express.png" alt="American Express">
            <img src="http://localhost/EMS-CI/assets/dist/img/credit/paypal2.png" alt="Paypal">
  
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Dear Liam Moore, Our Company has just processed your payments. Your payment has been deposited electronically in your account on 2021-04-30 19:27:02 <br> Regards OMS
            </p>
          </div>
          <!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Salary Info</p>
  
            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>₹<?php echo $totalAmount; ?></td>
                </tr>
                <tr>
                  <th>Tax (0%)</th>
                  <td>$ 0</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>₹<?php echo $totalAmount; ?></td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
      </div>
  
  
  <!-- ./wrapper -->
  
  
  </body></html>