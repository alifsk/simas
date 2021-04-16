<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>
                    @if (auth()->user()->level == 1)
                        Admin
                    @elseif (auth()->user()->level == 2)
                        Bendahara
                    {{-- @elseif (auth()->user()->level == 3)
                        Ustad --}}
                    @endif
                </a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->level == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <span>Beranda</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('visi.index') }}"><i class="fa fa-circle-o"></i> Visi</a></li>
                        <li class=""><a href="{{ route('misi.index') }}"><i class="fa fa-circle-o"></i> Misi</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Sholat</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('khutbah.index') }}"><i class="fa fa-circle-o"></i> Khutbah Jumat</a></li>
                        <li class=""><a href="{{ route('imam.index') }}"><i class="fa fa-circle-o"></i> Imam dan Muadzin</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-university"></i>
                        <span>Kegiatan</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('kegiatan.index') }}"><i class="fa fa-circle-o"></i> Tambah Kegiatan</a></li>
                        <li class=""><a href="{{ route('jenis_kegiatan.index') }}"><i class="fa fa-circle-o"></i> Jenis Kegiatan</a></li>
                        <li class=""><a href="{{ route('detail_kegiatan.index') }}"><i class="fa fa-circle-o"></i> Detail Kegiatan</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('pengguna.index') }}">
                        <i class="fa fa-users"></i> <span>User</span>
                    </a>
                </li>
            @elseif (auth()->user()->level == 2)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Kas Masjid</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('pemasukan.index') }}"><i class="fa fa-circle-o"></i> Pemasukan</a></li>
                        <li class=""><a href="{{ route('pengeluaran.index') }}"><i class="fa fa-circle-o"></i> Pengeluaran</a></li>
                        <li class=""><a href="{{ route('sumber_dana.index') }}"><i class="fa fa-circle-o"></i> Sumber Dana</a></li>
                        <li class="" class=""><a href="{{ route('laporan_rekapitulasi') }}"><i class="fa fa-circle-o"></i> Laporan Rekapitulasi</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-balance-scale"></i>
                        <span>Zakat</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('zakat.index') }}"><i class="fa fa-circle-o"></i> Pembayaran Zakat</a></li>
                        <li class=""><a href="{{ route('jenis_zakat.index') }}"><i class="fa fa-circle-o"></i> Jenis Zakat</a></li>
                    </ul>
                </li>
            {{-- @elseif (auth()->user()->level == 3)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Sholat</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('khutbah.index') }}"><i class="fa fa-circle-o"></i> Khutbah Jumat</a></li>
                    <li class=""><a href="{{ route('imam.index') }}"><i class="fa fa-circle-o"></i> Imam dan Muadzin</a></li>
                </ul>
            </li> --}}
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>