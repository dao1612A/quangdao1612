<?php
if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = 'uploads')
    {
        if (!$image) {
            return '/images/preloader.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}

if (!function_exists('upload_image')) {
    /**
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // thong tin file
        $info = new SplFileInfo($baseFilename);

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if (!$extend)
            $extend = ['png', 'jpg', 'jpeg', 'webp'];

        if (!in_array($ext, $extend))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . \Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;

        // thu muc goc de upload
        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder)
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d/');

        if (!\File::exists($path))
            mkdir($path, 0777, true);

        // di chuyen file vao thu muc uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);

        $data = [
            'name'     => $filename,
            'code'     => $code,
            'path'     => $path,
            'path_img' => 'uploads/' . $filename
        ];

        return $data;
    }
}

if (!function_exists('getLocation')) {
    function getLocation($id, $column = 'id')
    {
        try{
            return \App\Models\Location::find($id)->$column;
        }catch (\Exception $exception)
        {
            \Illuminate\Support\Facades\Log::error($exception->getMessage());
        }
        return "[N\A]";
    }
}

if (!function_exists('renderTimeDistance')) {
    function renderTimeDistance($minutes)
    {
        if($minutes < 60) return $minutes . ' Phút';
        $h = (int)($minutes / 60);
        if($h * 60 == $minutes) return $minutes . " Giờ";
        $p = $minutes - $h * 60;
        return $h . " Giờ " . $p . " Phút";
    }
}

if (!function_exists('getTypeCar')) {
    function getTypeCar()
    {
        return [
            1 => 'Limousine',
            2 => 'Xe khách',
            3 => 'Xe trung chuyển',
            4 => 'Xe liên tuyến',
            5 => 'Xe bao'
        ];
    }
}
