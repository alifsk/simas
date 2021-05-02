<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bukti Pembayaran Zakat</title>
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

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-lg-6 invoice-col">
                    {{--<img src="{{ url('/foto/baznas.png') }}" alt="Image" style="width: 20%">--}}
                    <strong>Bukti Pembayaran Zakat</strong><br>
                </div>
                <!-- /.col -->
                <div class="col-lg-6 invoice-col  pull-right">
                    <address>
                    <strong>Badan Amil Zakat Masjid Jamik Makbadul Muttaqin</strong><br>
                    Jl. Masjid, Rw. I, Sarirejo, Kec. Mojosari<br>
                    Mojokerto, Jawa Timur 61382<br>
                    Phone: (555) 539-1037
                    </address>
                </div>
            </div>
            <!-- Table row -->
            @foreach($zakat as $datas)
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="mt-4 mb-4">
                        <tr>
                            <td>NPWZ</td><td class="text-center" style="width: 50px"> : </td><td>{{ $datas->id_zakat }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Zakat</td><td class="text-center" style="width: 50px"> : </td><td>{{ $datas->jenis_zakat }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td><td class="text-center" style="width: 50px"> : </td><td>{{ $datas->nama }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah</td><td class="text-center" style="width: 50px"> : </td><td><b>{{ $datas->ket }}</b></td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
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
                                <td style="font-size: 14px; text-align: center; width: 284px;">Mojokerto, {{ $datas->tgl }}</td>
                            </tr>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;">Pembayar,</td>
                            </tr>
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td height="20%" style="font-size:14px;" width="45%">
                                <p style="text-align: center; color: #757575;">&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 344px;" width="50%">&nbsp;</td>
                                <td style="font-size: 14px; text-align: center; width: 284px;"><strong><u>{{ $datas->nama }}</u></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Code injected by live-server -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            window.print();

            window.onafterprint = function () {
                window.history.back()
            }

            let count = $('.jumlah-pengeluaran').length

            for (i = 1; i <= count; i++) {
                $('#jumlah-pengeluaran-'+ i).text(numbertocomma($('#jumlah-pengeluaran-'+ i).text()))
            }

            let total = $('#total-pengeluaran')
            let total_hasil = numbertocomma(total.text())
            
            total.text(total_hasil)

            function numbertocomma(amount) {
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
            }
        })
        // <![CDATA[  <-- For SVG support
        // if ('WebSocket' in window) {
        //     (function() {
        //         function refreshCSS() {
        //             var sheets = [].slice.call(document.getElementsByTagName("link"));
        //             var head = document.getElementsByTagName("head")[0];
        //             for (var i = 0; i < sheets.length; ++i) {
        //                 var elem = sheets[i];
        //                 var parent = elem.parentElement || head;
        //                 parent.removeChild(elem);
        //                 var rel = elem.rel;
        //                 if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
        //                     var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
        //                     elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
        //                 }
        //                 parent.appendChild(elem);
        //             }
        //         }
        //         var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
        //         var address = protocol + window.location.host + window.location.pathname + '/ws';
        //         var socket = new WebSocket(address);
        //         socket.onmessage = function(msg) {
        //             if (msg.data == 'reload') window.location.reload();
        //             else if (msg.data == 'refreshcss') refreshCSS();
        //         };
        //         if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
        //             console.log('Live reload enabled.');
        //             sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
        //         }
        //     })();
        // } else {
        //     console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        // }
        // ]]>
    </script>
</body>

</html>