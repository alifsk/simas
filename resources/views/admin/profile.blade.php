@extends('admin.v_template')
@section('title','User Profile')
@section('content')

<div class="container-wrapper">
    <div class="box box-primary">
         <div class="box-header with-border">
            <img class="profile-user-img img-responsive img-circle" src="{{ url('assets/admin/dist/img/user2-160x160.jpg')}}" alt="User profile picture">
            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
         </div>
            <!-- /.box-header -->
         <div class="box-body">
             <strong><i class="fa fa-phone margin-r-5"></i> Telepon</strong>
             <p class="text-muted">{{ Auth::user()->telp }}</p>
             <hr>
             <strong><i class="fa fa-google margin-r-5"></i> Email</strong>
             <p class="text-muted">{{ Auth::user()->email }}</p>
             <hr>
             <strong><i class="fa fa-wrench margin-r-5"></i> Level</strong>
             <p>
                @if (auth()->user()->level == 1)
                    <span class="label label-success">Admin</span>
                @elseif (auth()->user()->level == 2)
                    <span class="label label-warning">Bendahara</span>
                @elseif (auth()->user()->level == 3)
                    <span class="label label-info">Ustad</span>
                @endif
             </p>
             <hr>

             <a href="javascript:void(0)" class="btn btn-success btn-block" id="tombol-edit"><i class="fa  fa-edit" aria-hidden="true"></i> Edit Profile</a>
        </div>
            <!-- /.box-body -->
    </div>
</div>

@endsection

@section('extendsjs')
<script>
</script>
@endsection