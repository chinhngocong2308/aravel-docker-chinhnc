<?php

use Carbon\Carbon;

if (!function_exists('formatNumberFollows')) {
    function formatNumberFollows($number)
    {
        if ($number >= 1000) {
            return number_format($number / 1000) . 'K followers';
        }
        return $number . ' followers';
    }
}
if (!function_exists('limitString')) {
    function limitString($string, $limit = 241)
    {
        if (strlen($string) > $limit) {
            return substr($string, 0, $limit) . '...';
        }
        return $string;
    }
}

if (!function_exists('formatOpenDate')) {
    function formatOpenDate($date)
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
        $formattedDate = $carbonDate->diffForHumans();

        return $formattedDate;
    }
}

if (!function_exists('resize')) {
    function resize($file, $width, $height, $type = "")
    {

        $prefix_path = "storage/app/public/";
        $file = str_replace('storage/', '', $file);
        $root_path = substr(str_replace('public', '', getcwd()), 0, -1);

        $filename = $prefix_path . $file;

        $quality = 100;


        if (!file_exists($root_path . '/' . $filename) || !is_file($root_path . '/' . $filename)) {

            return;
        }

        $info = pathinfo($filename);

        $extension = $info['extension'];

        $file_name = basename($filename, "." . $extension);

        $old_image = $filename;

        $dir = dirname($file);

        $new_image = 'storage/app/public/cache/' . $dir . '/' . $file_name . '-' . $width . 'x' . $height . $type . '.' . $extension;

        $public_image = 'storage/cache/' . $dir . '/' . $file_name . '-' . $width . 'x' . $height . $type . '.' . $extension;

        if (!file_exists($root_path . '/' . $new_image) || (filemtime($root_path . '/' . $old_image) > filemtime($root_path . '/' . $new_image))) {

            $path = '';

            $directories = explode('/', dirname(str_replace('../', '', $new_image)));

            foreach ($directories as $directory) {

                $path = $path . '/' . $directory;

                if (!file_exists($root_path . '/' . $path)) {

                    @mkdir($root_path . $path, 0777);
                }
            }

            list($width_orig, $height_orig) = getimagesize($root_path . '/' . $old_image);

            if ($width_orig != $width || $height_orig != $height) {

                $info = getimagesize($root_path . '/' . $old_image);

                $imgtype = image_type_to_mime_type($info[2]);

                switch ($imgtype) {

                    case 'image/jpeg':

                        $source = imagecreatefromjpeg($root_path . '/' . $old_image);

                        break;

                    case 'image/gif':

                        $source = imagecreatefromgif($root_path . '/' . $old_image);

                        break;

                    case 'image/png':

                        $source = imagecreatefrompng($root_path . '/' . $old_image);

                        break;

                    default:

                        die('Invalid image type: ' . $file);
                }

                $src_w = imagesx($source);

                $src_h = imagesy($source);

                $x_ratio = $width / $src_w;

                $y_ratio = $height / $src_h;

                if (($src_w <= $width) && ($src_h <= $height)) {

                    $new_w = $src_w;

                    $new_h = $src_h;
                } elseif (($x_ratio * $src_h) < $height) {

                    $new_h = ceil($x_ratio * $src_h);

                    $new_w = $width;
                } else {

                    $new_w = ceil($y_ratio * $src_w);

                    $new_h = $height;
                }

                $newpic = imagecreatetruecolor(round($new_w), round($new_h));

                imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);

                $final = imagecreatetruecolor($width, $height);

                $backgroundColor = imagecolorallocate($final, 255, 255, 255);

                imagefill($final, 0, 0, $backgroundColor);

                imagecopy($final, $newpic, (($width - $new_w) / 2), (($height - $new_h) / 2), 0, 0, $new_w, $new_h);

                imagejpeg($final, $root_path . '/' . $new_image, $quality);
            } else {

                copy($root_path . '/' . $old_image, $root_path . '/' . $new_image);
            }
        }

        return url($public_image);
    }
}

if (!function_exists('getDateFromString')) {
    /**
     * anytime, passmonth, passweek, pass24hours
     * @param string $timePeriod .
     */
    function getDateFromString($timePeriod)
    {

        switch (strtolower($timePeriod)) {
            case 'anytime':
                return null;

            case 'passmonth':
                return Carbon::now()->subMonth()->startOfMonth()->toDateString(); 

            case 'passweek':
                return Carbon::now()->startOfWeek()->subWeek()->toDateString(); 

            case 'pass24hours':
                return Carbon::now()->subDay()->toDateString();

            default:
                return null;
        }
    }
}
