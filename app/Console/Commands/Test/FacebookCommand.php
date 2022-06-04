<?php

namespace App\Console\Commands\Test;

use Illuminate\Console\Command;

class FacebookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebook:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Facebook';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $res          = "\033[0m";
        $red          = "\033[1;31m";
        $lime         = "\033[1;32m";
        $cyan         = "\033[1;36m";
        $yellow       = "\033[1;33m";
        $turquoise    = "\033[1;34m";
        $lightSkyBlue = "\033[1;35m";
        $white        = "\033[1;37m";

        $this->info('-- init file index.php -- ');

        $result = json_decode($this->curlInit(), true);
        if (isset($result['success']) && $result['success'] == true) {
            $this->info("-- -- Login success");
        } else {
            $this->error("-- -- Login error");
        }

        $this->warn('[Process] -- -- ');
        $stdin     = fopen('php://stdin', 'r');
        $nameSTDIN = trim(fgets($stdin));
        $cookie    = trim(fgets($nameSTDIN));

        #get_token
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://m.facebook.com/composer/ocelot/async_loader/?publisher=feed');
        $head[] = "Connection: keep-alive";
        $head[] = "Keep-Alive: 300";
        $head[] = "authority: m.facebook.com";
        $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
        $head[] = "cache-control: max-age=0";
        $head[] = "upgrade-insecure-requests: 1";
        $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
        $head[] = "sec-fetch-site: none";
        $head[] = "sec-fetch-mode: navigate";
        $head[] = "sec-fetch-user: ?1";
        $head[] = "sec-fetch-dest: document";
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        $access = curl_exec($ch);
        curl_close($ch);
        if (explode('\",\"useLocalFilePreview', explode('accessToken\":\"', $access)[1])[0]) {
            $access_token = explode('\",\"useLocalFilePreview', explode('accessToken\":\"', $access)[1])[0];
            if (json_decode(file_get_contents('https://graph.facebook.com/me/?access_token=' . $access_token))->{'id'}) {
                $idfb = json_decode(file_get_contents('https://graph.facebook.com/me/?access_token=' . $access_token))->{'id'};
            } else {
                exit($red . "Cookie die!!");
            }
            $user = $_SESSION["username"];
            $xu   = file_get_contents('https://traodoisub.com/scr/test3.php?user=' . $user);
            sleep(2);
            function follow($access_token, $id, $cookie)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/subscribers');
                $head[] = "Connection: keep-alive";
                $head[] = "Keep-Alive: 300";
                $head[] = "authority: m.facebook.com";
                $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
                $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
                $head[] = "cache-control: max-age=0";
                $head[] = "upgrade-insecure-requests: 1";
                $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
                $head[] = "sec-fetch-site: none";
                $head[] = "sec-fetch-mode: navigate";
                $head[] = "sec-fetch-user: ?1";
                $head[] = "sec-fetch-dest: document";
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
                $data = array('access_token' => $access_token);
                curl_setopt($ch, CURLOPT_POST, count($data));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $access = curl_exec($ch);
                curl_close($ch);
                return json_decode($access);
            }

            function like($access_token, $id, $cookie)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/likes');
                $head[] = "Connection: keep-alive";
                $head[] = "Keep-Alive: 300";
                $head[] = "authority: m.facebook.com";
                $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
                $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
                $head[] = "cache-control: max-age=0";
                $head[] = "upgrade-insecure-requests: 1";
                $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
                $head[] = "sec-fetch-site: none";
                $head[] = "sec-fetch-mode: navigate";
                $head[] = "sec-fetch-user: ?1";
                $head[] = "sec-fetch-dest: document";
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
                $data = array('access_token' => $access_token);
                curl_setopt($ch, CURLOPT_POST, count($data));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $access = curl_exec($ch);
                curl_close($ch);
                return json_decode($access);
            }

            function cmt($access_token, $id, $cookie, $msg)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/' . $id . '/comments');
                $head[] = "Connection: keep-alive";
                $head[] = "Keep-Alive: 300";
                $head[] = "authority: m.facebook.com";
                $head[] = "ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
                $head[] = "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5";
                $head[] = "cache-control: max-age=0";
                $head[] = "upgrade-insecure-requests: 1";
                $head[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
                $head[] = "sec-fetch-site: none";
                $head[] = "sec-fetch-mode: navigate";
                $head[] = "sec-fetch-user: ?1";
                $head[] = "sec-fetch-dest: document";
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
                $data = array('message' => $msg, 'access_token' => $access_token);
                curl_setopt($ch, CURLOPT_POST, count($data));
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $access = curl_exec($ch);
                curl_close($ch);
                return json_decode($access);
            }

            function page($id, $cookie)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id);
                $head[] = "Connection: keep-alive";
                $head[] = "Keep-Alive: 300";
                $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
                $head[] = "Accept-Language: en-us,en;q=0.5";
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
                :'));
                $page = curl_exec($ch);
                if (explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0]) {
                    $get  = explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0];
                    $link = 'https://mbasic.facebook.com/a/profile.php?fan&id=' . $id . '&origin=page_profile&pageSuggestionsOnLiking=1&gfid=' . $get . '&refid=17';
                    curl_setopt($ch, CURLOPT_URL, $link);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_exec($ch);
                }
                curl_close($ch);

            }

            function camxuc($id, $type, $cookie)
            {
                $ch = curl_init();
                if (strpos($id, '_')) {
                    $uid = explode('_', $id, 2);
                    $id2 = 'story.php?story_fbid=' . $uid[1] . '&id=' . $uid[0];
                } else {
                    $id2 = $id;
                }
                curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id2);
                $head[] = "Connection: keep-alive";
                $head[] = "Keep-Alive: 300";
                $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
                $head[] = "Accept-Language: en-us,en;q=0.5";
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; RMX1921) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.101 Mobile Safari/537.36');
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_COOKIE, $cookie);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
                :'));
                $page = curl_exec($ch);
                if ($id2 != $id && explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0]) {
                    $get = explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0];
                } else {
                    $get = $id2;
                }
                $link = 'https://mbasic.facebook.com/reactions/picker/?is_permalink=1&ft_id=' . $get;
                curl_setopt($ch, CURLOPT_URL, $link);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $cx   = curl_exec($ch);
                $haha = explode('<a href="', $cx);
                if ($type == 'LOVE') {
                    $haha2 = explode('" style="display:block"', $haha[2])[0];
                } else if ($type == 'WOW') {
                    $haha2 = explode('" style="display:block"', $haha[5])[0];
                } else if ($type == 'HAHA') {
                    $haha2 = explode('" style="display:block"', $haha[4])[0];
                } else if ($type == 'SAD') {
                    $haha2 = explode('" style="display:block"', $haha[6])[0];
                } else {
                    $haha2 = explode('" style="display:block"', $haha[7])[0];
                }
                $link2 = html_entity_decode($haha2);

                curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com' . $link2);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_exec($ch);
                curl_close($ch);
            }

            @system('clear');
            echo $white . "- - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
            echo $turquoise . "Nhập số nhiệm vụ dừng để chống block: $lightSkyBlue";
            $_SESSION['block'] = trim(fgets(STDIN));

            echo $turquoise . "Bao nhiêu giây thì delay nhiệm vụ hoạt động: $lightSkyBlue";
            $_SESSION['j'] = trim(fgets(STDIN));
            @system('clear');
            echo $white . "- - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $yellow Tool Auto Trao Đổi Sub Cookie 8.0\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $turquoise Bản Quyền: Lê Văn Bình\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $cyan Facebook.com/binh.pro2001\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $red Ví MoMo\033[1;32m :\033[1;34m0357385033\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime YouTube : LÊ VĂN BÌNH ✅\n";
            echo $white . "- - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Đang Tool ID :$lightSkyBlue $idfb\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Tên Tài Khoản :$lightSkyBlue $user\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [1] Chế Độ Auto Follow\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [2] Chế Độ Auto Like\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [3] Chế Độ Auto Like Follow\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [4] Chế Độ Auto Like Page\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [5] Chế Độ Auto Like Commet\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [6] Chế Độ Auto Page Follow\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [7] Chế Độ Auto Commet Follow\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [8] Chế Độ Auto Page Commet\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [9] Chế Độ Auto Like Cảm Xúc\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [10] Chế Độ Auto Follow Cảm Xúc\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [11] Chế Độ Auto Page Cảm Xúc\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [12] Chế Độ Auto Commet Cảm Xúc\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [13] Chế Độ Auto Follow Like Comment\n";
            echo $Lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white => $lime Nhập [14] Chế Độ Random Full Nhiệm Vụ\n";
            echo $lime . "\033[1;37m~\033[1;31m[\033[1;35m🌸\033[1;31m]$white =>$lime  Vui Lòng Nhập Chế Độ:$lightSkyBlue";
            $nv = trim(fgets(STDIN));
            if ($nv == '1') {
                array_push($listnv, 'sub');
            } elseif ($nv == '2') {
                array_push($listnv, 'like');
            } elseif ($nv == '3') {
                array_push($listnv, 'like', 'sub');
            } elseif ($nv == '4') {
                array_push($listnv, 'like', 'page');
            } elseif ($nv == '5') {
                array_push($listnv, 'like', 'cmt');
            } elseif ($nv == '6') {
                array_push($listnv, 'page', 'sub');
            } elseif ($nv == '7') {
                array_push($listnv, 'cmt', 'sub');
            } elseif ($nv == '8') {
                array_push($listnv, 'cmt', 'page');
            } elseif ($nv == '9') {
                array_push($listnv, 'like', 'cx');
            } elseif ($nv == '10') {
                array_push($listnv, 'sub', 'cx');
            } elseif ($nv == '11') {
                array_push($listnv, 'page', 'cx');
            } elseif ($nv == '12') {
                array_push($listnv, 'cmt', 'cx');
            } elseif ($nv == '13') {
                array_push($listnv, 'sub', 'like', 'cmt');
            } elseif ($nv == '14') {
                array_push($listnv, 'sub', 'like', 'page', 'cx', 'cmt');
            } else {
                exit("Bạn nhập sai rồi!");
            }
            sleep(1);
            echo $white . "\033[1;37m~\033[1;31m[\033[1;32m⏰\033[1;31m]$white =>$lime  Nhập Time Delay: $lightSkyBlue";
            $_SESSION['delay'] = trim(fgets(STDIN));
            if ($_SESSION['delay'] < 0) {
                exit($red . "Tối thiểu 0 giây: \n\n");
            }
        } else {
            exit($red . "Tài khoản hoặc mật khẩu sai, kiểm tra lại");
        }
        echo $white . "- - - - - - - - - - - - - - - - - - - - - - - - - - - -\n";
        sleep(2);
        $h       = datnick($user, $idfb);
        $stt     = 1;
        $tgblock = 1;
        if ($h == '1') {
            $i = 1;
            while ($i < 6473728284838) {
                foreach ($listnv as $loai) {
                    if ($loai == 'sub') {
                        $list  = getnv('follow', $user);
                        $check = count($list);
                        if ($check == 0) {
                            echo $turquoise . "\r~Tạm Thời Hết Nhiệm Vụ Follow!";
                            echo "\r";
                            $i++;
                            continue;
                        }
                        foreach ($list as $id) {
                            $g = follow($access_token, $id, $cookie);
                            if ($g->{'error'}->{'code'} == 368) {
                                exit($red . "Đã bị block!");
                            }
                            $s = nhantien('sub', $id);
                            if ($s == 2) {
                                $today = date('H:i');
                                $xu    = $xu + 600;
                                $xu1   = $red . "$lime +600$lightSkyBlue 🌸$yellow $xu\n";
                                $t     = $yellow . "\033[1;36m[$stt]$lightSkyBlue 🌸$lightSkyBlue $today$lightSkyBlue 🌸 ";
                                $t1    = $lime . "FOLLOW$lightSkyBlue 🌸$lime $id$lightSkyBlue 🌸";
                                echo $t;
                                sleep(1);
                                echo $t1;
                                sleep(1);
                                echo $xu1;
                                for ($v = 0; $v < ($_SESSION['delay'] + 1); $v++) {
                                    echo $white . "   \r⏳ Vui Lòng Chờ " . ($_SESSION['delay'] - $v);
                                    sleep(1);
                                    echo "\r";
                                }
                                $stt++;
                                if ($stt > $_SESSION['block']) {
                                    for ($x = 0; $x < ($_SESSION['j'] + 1); $x++) {
                                        echo $red . "   \r\033[1;37m⌛ Tool Tạm Dừng " . ($_SESSION['j'] - $x) . " Giây Chống Block!";
                                        sleep(1);
                                        echo "\r";
                                    }
                                    $tgblock++;
                                    $_SESSION['block'] = $tgblock * $_SESSION['block'];
                                }
                            } else {
                                echo "\r";
                                echo $red . "[FLLOW] => Thất Bại $id";
                                sleep(2);
                                echo "\r";
                                continue;
                            }
                        }
                    } elseif ($loai == 'cmt') {
                        $list  = getnv('cmt', $user);
                        $check = count($list);
                        if ($check == 0) {
                            echo $turquoise . "\r~Tạm Thời Hết Nhiệm Vụ CMT!";
                            echo "\r";
                            $i++;
                            continue;
                        }
                        foreach ($list as $id => $key) {
                            $uid = $key->{'id'};
                            $msg = $key->{'nd'};
                            $g   = cmt($access_token, $uid, $cookie, $msg);
                            if ($g->{'error'}->{'code'} == 368) {
                                exit($red . "Đã bị block!");
                            }
                            $s = nhantien('cmt', $uid);
                            if ($s == 2) {
                                $today = date('H:i');
                                $xu    = $xu + 600;
                                $xu1   = $red . "$lime +600$lightSkyBlue 🌸$lime $xu\n";
                                $xu2   = $yellow . "\033[1;36m[$stt]$lightSkyBlue 🌸$lightSkyBlue $today$lightSkyBlue 🌸 ";
                                $d     = $lime . "CMT$red 🌸$lime $uid$lightSkyBlue 🌸";
                                echo $xu2;
                                sleep(1);
                                echo $d;
                                sleep(1);
                                echo $xu1;
                                for ($v = 0; $v < ($_SESSION['delay'] + 1); $v++) {
                                    echo $white . "   \r⏳ Vui Lòng Chờ " . ($_SESSION['delay'] - $v);
                                    sleep(1);
                                    echo "\r";
                                }
                                $stt++;
                                if ($stt > $_SESSION['block']) {
                                    for ($x = 0; $x < ($_SESSION['j'] + 1); $x++) {
                                        echo $red . "   \r\033[1;37m⌛ Tool Tạm Dừng " . ($_SESSION['j'] - $x) . " Giây Chống Block!";
                                        sleep(1);
                                        echo "\r";
                                    }
                                    $tgblock++;
                                    $_SESSION['block'] = $tgblock * $_SESSION['block'];
                                }
                            } else {
                                echo "\r";
                                echo $red . "[CMT] => Thất Bại $uid";
                                sleep(2);
                                echo "\r";
                                continue;
                            }
                        }
                    } elseif ($loai == 'page') {
                        $list  = getnv('likepage', $user);
                        $check = count($list);
                        if ($check == 0) {
                            echo $turquoise . "\r~Tạm Thời Hết Nhiệm Vụ Page!";
                            echo "\r";
                            $i++;
                            continue;
                        }
                        foreach ($list as $id) {
                            $g = page($cookie, $id);
                            if ($g->{'error'}->{'code'} == 368) {
                                exit($red . "Đã bị block!");
                            }
                            page($id, $cookie);
                            $s = nhantien('page', $id);
                            if ($s == 2) {
                                $today = date('H:i');
                                $xu    = $xu + 600;
                                $xu1   = $red . "$lime +600$lightSkyBlue 🌸$yellow $xu\n";
                                $c     = $yellow . "\033[1;36m[$stt]$lightSkyBlue 🌸$lightSkyBlue $today$lightSkyBlue 🌸 ";
                                $h     = $lime . "FAGE$lightSkyBlue 🌸$lime $id$lightSkyBlue 🌸";
                                echo $c;
                                sleep(1);
                                echo $h;
                                sleep(1);
                                echo $xu1;
                                for ($v = 0; $v < ($_SESSION['delay'] + 1); $v++) {
                                    echo $white . "   \r⏳ Vui Lòng Chờ " . ($_SESSION['delay'] - $v);
                                    sleep(1);
                                    echo "\r";
                                }
                                $stt++;
                                if ($stt > $_SESSION['block']) {
                                    for ($x = 0; $x < ($_SESSION['j'] + 1); $x++) {
                                        echo $red . "   \r\033[1;37m⌛ Tool Tạm Dừng " . ($_SESSION['j'] - $x) . " Giây Chống Block!";
                                        sleep(1);
                                        echo "\r";
                                    }
                                    $tgblock++;
                                    $_SESSION['block'] = $tgblock * $_SESSION['block'];
                                }
                            } else {
                                echo "\r";
                                echo $red . "[FAGE] => Thất Bại $id";
                                sleep(2);
                                echo "\r";
                                continue;
                            }
                        }
                    } else if ($loai == 'cx') {
                        $list  = getnv('camxuc', $user);
                        $check = count($list);
                        if ($check == 0) {
                            echo $turquoise . "\r~Tạm Thời Hết Nhiệm Vụ Cảm Xúc!";
                            echo "\r";
                            $i++;
                            continue;
                        }
                        foreach ($list as $id => $key) {
                            $id   = $key->{'id'};
                            $type = $key->{'type'};
                            camxuc($id, $type, $cookie);
                            $s = nhantiencx($type, $id);
                            if ($s == 2) {
                                $today = date('H:i');
                                $xu    = $xu + 400;
                                $xu1   = $red . "$lime +400$lightSkyBlue 🌸$yellow $xu\n";
                                $z     = $yellow . "\033[1;36m[$stt]$red 🌸$lightSkyBlue $today$lightSkyBlue 🌸 ";
                                $w     = $lime . "$type$lightSkyBlue 🌸$lime $id$lightSkyBlue 🌸";
                                echo $z;
                                sleep(1);
                                echo $w;
                                sleep(1);
                                echo $xu1;
                                for ($v = 0; $v < ($_SESSION['delay'] + 1); $v++) {
                                    echo $white . "   \r⏳ Vui Lòng Chờ " . ($_SESSION['delay'] - $v);
                                    sleep(1);
                                    echo "\r";
                                }
                                $stt++;
                                if ($stt > $_SESSION['block']) {
                                    for ($x = 0; $x < ($_SESSION['j'] + 1); $x++) {
                                        echo $red . "   \r\033[1;37m⌛ Tool Tạm Dừng " . ($_SESSION['j'] - $x) . " Giây Chống Block!";
                                        sleep(1);
                                        echo "\r";
                                    }
                                    $tgblock++;
                                    $_SESSION['block'] = $tgblock * $_SESSION['block'];
                                }
                            } else {
                                echo "\r";
                                echo $red . "[$type] => Thất Bại $id";
                                sleep(2);
                                echo "\r";
                                continue;
                            }
                        }
                    } elseif ($loai == 'like') {
                        $list  = getnv('like', $user);
                        $check = count($list);
                        if ($check == 0) {
                            echo $turquoise . "\r~Tạm Thời Hết Nhiệm Vụ Like!";
                            echo "\r";
                            $i++;
                            continue;
                        }
                        foreach ($list as $id) {
                            $g = like($access_token, $id, $cookie);
                            if ($g->{'error'}->{'code'} == 368) {
                                exit($red . "Đã bị block!");
                            }
                            $s = nhantien('like', $id);
                            if ($s == 2) {
                                $today = date('H:i');
                                $xu    = $xu + 200;
                                $xu1   = $red . "$lime +200$lightSkyBlue 🌸$yellow $xu\n";
                                $u2    = $yellow . "\033[1;36m[$stt]$red 🌸$lightSkyBlue $today$lightSkyBlue 🌸 ";
                                $e     = $lime . "LIKE$lightSkyBlue 🌸$lime $id$lightSkyBlue 🌸";
                                echo $u2;
                                sleep(1);
                                echo $e;
                                sleep(1);
                                echo $xu1;
                                for ($v = 0; $v < ($_SESSION['delay'] + 1); $v++) {
                                    echo $white . "   \r⏳ Vui Lòng Chờ " . ($_SESSION['delay'] - $v);
                                    sleep(1);
                                    echo "\r";
                                }
                                $stt++;
                                if ($stt > $_SESSION['block']) {
                                    for ($x = 0; $x < ($_SESSION['j'] + 1); $x++) {
                                        echo $red . "   \r\033[1;37m⌛ Tool Tạm Dừng " . ($_SESSION['j'] - $x) . " Giây Chống Block!";
                                        sleep(1);
                                        echo "\r";
                                    }
                                    $tgblock++;
                                    $_SESSION['block'] = $tgblock * $_SESSION['block'];
                                }
                            } else {
                                echo "\r";
                                echo $red . "[LIKE] => Thất Bại $id";
                                sleep(2);
                                echo "\r";
                                continue;
                            }
                        }
                    }
                }
                $i++;
            }
        } else {
            exit($red . "Cấu hình thất bại, vui lòng thêm id: ID vào cấu hình");
        }
    }

    protected function curlInit()
    {
        // Các tham số
        $param = array(
            'username' => 'binhvv04',
            'password' => 'binh4342',
        );

        // Khởi tạo CURL
        $ch = curl_init('https://traodoisub.com/scr/login.php');
        // Thiết lập có return
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, count($param));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        // Thiết lập sử dụng trình duyệt hiện tại
//        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
