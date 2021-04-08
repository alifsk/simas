<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Rekapitulasi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('assets/admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('assets/admin/dist/css/AdminLTE.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .custom-td-jumlah {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Laporan Pemasukan Bulanan
                        <small class="pull-right">Tanggal: {{ date('d M Y') }} </small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Sumber Dana</th>
                                <th>Keterangan</th>
                                <th class="text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($pemasukanPertanggal as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->tgl }}</td>
                                <td>{{ $data->sumber_dana }}</td>
                                <td>{{ $data->ket }}</td>
                                <td class="custom-td-jumlah">
                                    <span>Rp</span>
                                    <span class="jumlah-pemasukan" id="jumlah-pemasukan-{{ $loop->iteration }}">{{ $data->jumlah }}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                                <td class="text-right" colspan="4"><b>Subtotal</b></td>
                                <td class="custom-td-jumlah">
                                    <span>Rp</span>
                                    <span id="total-pemasukan">{{ $total }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 30%;">
                        <div class="card-header">
                            <p class="lead">Informasi Keuangan:</p>
                        </div>
                        <div class="card-body" style="margin-top: 2px;">
                            <div class="text-muted well well-sm no-shadow">
                                <p>Total Pemasukan &nbsp;&nbsp;&nbsp; : {{$total_pemasukan}}</p>
                                <p>Total Pengeluaran &nbsp;&nbsp;: {{$total_pengeluaran}}</p>
                                <p>Saldo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$saldo}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table border="0" cellpadding="0" cellspacing="0" style="margin-left: 70%;">
                        <tbody>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;">Mojokerto, {{ date('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;">Bendahara,</td>
                            </tr>
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td height="20%" style="font-size:14px;" width="45%">
                                <p style="text-align: center; color: #757575;">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;"><strong><u>H. Mukhlis, S.Ag.</u></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Code injected by live-server -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let count = $('.jumlah-pemasukan').length

            for (i = 1; i <= count; i++) {
                $('#jumlah-pemasukan-'+ i).text(numbertocomma($('#jumlah-pemasukan-'+ i).text()))
            }

            let total = $('#total-pemasukan')
            let total_hasil = numbertocomma(total.text())
            
            total.text(total_hasil)

            function numbertocomma(amount) {
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
            }
        })
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

</html>