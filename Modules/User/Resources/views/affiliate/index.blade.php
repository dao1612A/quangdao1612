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
                <li><a href="/" title="Trang chủ">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li><span>Affiliate</span></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="users">
                <div class="users-sidebars">
                    @include('guest::components._inc_guest_sidebar')
                </div>
                <div class="users-content">
                    <div class="title mb5">Link giới thiệu của bạn</div>
                    <div class="row">
                        <p style="background-color: #f2f2f2;display: flex;width: 100%">
                            <input id="myInput" type="text" style="width: 100%;background: #f2f2f2;outline: none;border: none;max-width: 100%;"
                                   value="{{ route('get.register',['presenter' => get_data_user('users')]) }}">
                            <a href="" class="btn btn-xs btn-secondary"
                               style="padding: 10px 15px;font-size: 15px;"onclick=myFunctionCopy()> <i class="fa fa-clipboard"></i> Sao chép </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function myFunctionCopy() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Bạn đã copy link thành công: " + copyText.value);
        }
    </script>

@stop