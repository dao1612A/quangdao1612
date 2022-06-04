@extends('layouts.app_user')
@section('css')
    <style>
        .sg ins {
            margin: auto;
        }
        <?php $style = file_get_contents('assets/css/user.min.css');echo $style;?>
    </style>
@stop
@section('content-fluid')
    <section class="breadcrumb" style="padding: 0">
        <div class="container breadcrumb-content">
            <ul>
                <li><a href="/" title="Giaoan247">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li><span>Thông tin</span></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="users">
                <div class="users-sidebars">
                    @include('user::components._inc_nav_user')
                </div>
                <div class="users-content">
                    @if(session('toastr.update_info'))
                        <div class="callout callout-danger" style="margin: 15px 0">
                            <p>{{ session('toastr.update_info') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('get_user.info.update') }}" id="formRegister" method="POST" autocomplete="off">
                        @csrf
                        <div class="col-contact">
                            <div class="form-group">
                                <input type="text" required class="form-control" placeholder="Họ Tên" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required placeholder="Số điện thoại" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <input type="email" disabled required name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <input type="text" required name="address" class="form-control" placeholder="Nghệ An" value="{{ $user->address }}">
                            </div>
                            <button type="submit" class="btn btn-blue">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop