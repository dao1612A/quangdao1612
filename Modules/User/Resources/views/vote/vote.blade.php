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
                <li><a href="/" title="Conha.vn">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li><span>Đánh giá nhà xe</span></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container page-info-ticket">
            <div class="box">
                <div class="box-left">
                    <form action="" method="POST">
                        <div class="card">
                            <h4>Đánh giá tổng quát chuyến đi của bạn ?</h4>
                            <p>
                            <p> Bạn chỉ mất 1 phút để hoàn thành bảng đánh giá này! <br> Đánh giá ẩn danh của bạn sẽ
                                giúp ích người khác tìm được chuyến đi phù hợp. Cám ơn! </p></p>

                            @csrf
                            <div class="form-group">
                                <div class="box-vote-item" style="display: flex;align-items: center">
                                    <label for="" class="mr10">Đánh giá tổng thể</label>
                                    <div class="js-star-0 star box-vote">
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>

                                    <input type="hidden" required name="vote"  class="number_vote" value="" data-error="#error0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cảm nhận của bạn</label>
                                <textarea name="content_vote" required class="form-control" id="" cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>
                        <div class="card mt20">
                            <h4>Đánh giá chi tiết về chuyến đi của bạn ?</h4>
                            <p>
                            <p> Chi tiết bao gồm thái độ phụ vụ, vệ sinh, an toàn  ...</p></p>

                            @csrf
                            <div class="form-group">
                                <div class="box-vote-item">
                                    <div class="js-star-0 star box-vote">
                                        <label for="">Tiện ích</label>
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>
                                    <input type="hidden" required name="vote_utilities" class="number_vote" value="" data-error="#error0">
                                </div>
                                <div class="box-vote-item mt10">
                                    <div class="js-star-0 star box-vote">
                                        <label for="">Thông tin</label>
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>
                                    <input type="hidden" required name="vote_info" class="number_vote" value="" data-error="#error0">
                                </div>
                                <div class="box-vote-item mt10">
                                    <div class="js-star-0 star box-vote">
                                        <label for="">An toàn</label>
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>
                                    <input type="hidden" required name="vote_safe" class="number_vote" value="" data-error="#error0">
                                </div>
                                <div class="box-vote-item mt10">
                                    <div class="js-star-0 star box-vote">
                                        <label for="">Chất lượng</label>
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>
                                    <input type="hidden" required name="vote_quality" class="number_vote" value="" data-error="#error0">
                                </div>
                                <div class="box-vote-item mt10">
                                    <div class="js-star-0 star box-vote">
                                        <label for="">Thái độ</label>
                                        <i class="fa custom-star fa-star-o" data-i="1" data-rating-text="Rất tệ"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="2"
                                           data-rating-text="Cần cải thiện nhiều" style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="3" data-rating-text="Tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="4" data-rating-text="Rất tốt"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <i class="fa custom-star fa-star-o" data-i="5" data-rating-text="Tuyệt vời!"
                                           style="color: rgb(255, 255, 255);"></i>
                                        <span></span>
                                    </div>
                                    <input type="hidden" required name="vote_attitude" class="number_vote" value="" data-error="#error0">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" style="width: 200px" class="btn btn-orange mt10 btn-radius">Gửi nhận xét</button>
                        </div>
                    </form>
                </div>
                <div class="box-right">
                    <div class="content" style="background: rgb(250, 250, 250)">
                        <h2>Hướng dẫn và điều kiện về đánh giá</h2>
                        <p>Mọi đánh giá phải tuân thủ Hướng Dẫn &amp; Điều Kiện về đánh giá để được hiển thị trên
                            website.</p>
                        <p>Xin vui lòng:</p>
                        <ul>
                            <li>Không sử dụng từ ngữ mang ý xúc phạm, miệt thị</li>
                            <li>Không cung cấp thông tin cá nhân</li>
                            <li>Không cung cấp thông tin bảo mật, bí mật kinh doanh của công ty</li>
                        </ul>
                        <br>
                        <p> Cảm ơn bạn đã đưa ra những đánh giá chân thực nhất. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop