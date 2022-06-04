<?php

if( !function_exists('get_data_user'))
{
    function get_data_user($guest, $column = 'id')
    {
        return Auth::guard($guest)->user() ? Auth::guard($guest)->user()->$column : null;
    }
}

if( !function_exists('replace_url'))
{
    function replace_url($url)
    {
        return parse_url($url)['path'] ?? '';
    }
}

if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}

if (!function_exists('render_code')) {
    function render_code($prefix = 'KM') {
        $code = bcrypt(md5(\Carbon\Carbon::now()) . md5($prefix .\Carbon\Carbon::now()));
        $code1 = substr($code,0,4);
        $code2 = substr($code,10,strlen($code));
        $code = substr(md5($code1 . $code2),0,8);
        return trim($prefix . $code);
    }
}


if (!function_exists('detectDevice')) {
    function detectDevice($all = false)
    {
        $instance = \App\Core\MobileDetectSingleton::instance();
        if ($all)
        {
            $device = null;
            if ($instance->isTablet())
                $device = 'tablet';
            else if ($instance->isMobile())
                $device = 'mobile';
            else
                $device = 'desktop';

            return $device;
        }
        return $instance->isMobile() ? 'mobile' : 'desktop';
    }
}

