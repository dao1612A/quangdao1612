@extends('mail.app_mail')
@section('table')
    <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi <b>{{ $user->name }}</b>,</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"><b>Cảm ơn bạn đã đặt lịch khám tại Doctors Care</b></p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thông tin cho cuộc hẹn</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Tên bác sĩ <b>{{ $doctor->name }}</b></p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thời gian <b>{{ $transaction->t_time_text }}</b></p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Ngày <b>{{ $transaction->date }}</b></p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                Tổng số tiền đã thanh toán là <b>{{ number_format($transaction->t_total_money,0,',','.') }}</b> VNĐ</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hệ thống <b>Doctors case</b> sẽ tự động gủi email thông báo khi
            cuộc hẹn được xác nhận hoàn tất</p>
        </td>
    </tr>
@stop
