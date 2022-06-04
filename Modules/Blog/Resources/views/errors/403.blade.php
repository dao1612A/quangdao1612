@extends('admin::layouts.master')
@section('content')
    <section class="content" style="padding-top: 50px;">
        <div class="error-page" >
            <h2 class="headline text-red">403</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Xin lỗi bạn không có quyền truy cập nội dung này.</h3>
                <p>
                    We will work on fixing that right away.
                    Meanwhile, you may <a href="/admin" >return to dashboard</a> or try using the search form.
                </p>
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
        </div>
        <!-- /.error-page -->
    </section>
@endsection
