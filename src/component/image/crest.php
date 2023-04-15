<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/SphereWeb
 * Date: 09.09.2022 / 20:10:40
 */

namespace Ofey\Logan22\component\image;

use Ofey\Logan22\model\user\auth\auth;

class crest {


    /**
     * Преобразование текстур иконок клана и альянса в изображение кодировки base64
     * Клан и альянса изображение должны иметь название clan_crest и alliance_crest
     */
    static public function conversion(&$arr_crest) {
        $isSingle = count($arr_crest) - count($arr_crest, COUNT_RECURSIVE) >= 0;
        if ($isSingle) {
            $arr_crest = self::crest_extract($arr_crest);
        } else {
            foreach ($arr_crest as &$row) {
                $row = self::crest_extract($row);
            }
        }
    }


    /**
     * Сохранить текстуру клана/альянса в файл
     * @param      $image
     * @param      $clan_name
     * @param null $server_id
     *
     * @return string|void
     * @throws \Exception
     */
    public static function get_clan_crest($image, $clan_name, $server_id = null) {
        if($image == null) {
            return '';
        }
        if($server_id == null) {
            $server_id = auth::get_default_server();
        }
        $file_clan_name = sha1($server_id . $clan_name);
        $save = "template/crests/" . $file_clan_name . ".png";

        if(file_exists($save)) {
            return $save;
        }

        if(!is_dir(dirname($save))) {
            if(!mkdir(dirname($save), 0777, true)) {
                return '1';
            }
        }

        $rnd_file = tmpfile();
        fwrite($rnd_file, $image);
        fseek($rnd_file, 0);
        $file = &$rnd_file;
        $dds = fread($file, 4);

        // Do not continue if the file is not a DDS image
        if($dds !== 'DDS ')
            die("Error: is not an DDS image");

        $hdrSize = self::readInt($file);
        $hdrFlags = self::readInt($file);
        $imgHeight = self::readInt($file) - 4;
        $imgWidth = self::readInt($file);
        $imgPitch = self::readShort($file);
        fseek($file, 84);
        $dxt1 = fread($file, 4);

        // do not conintue in case of a non DX1 format
        if($dxt1 !== 'DXT1')
            return '';
//            die("Error: format is not DX1");

        fseek($file, 128);
        $img = imagecreatetruecolor($imgWidth, $imgHeight);
        for($y = -1; $y < $imgHeight / 4; $y++) {
            for($x = 0; $x < $imgWidth / 4; $x++) {
                $color0_16 = self::readShort($file);
                $color1_16 = self::readShort($file);
                $r0 = ($color0_16 >> 11) << 3;
                $g0 = (($color0_16 >> 5) & 63) << 2;
                $b0 = ($color0_16 & 31) << 3;
                $r1 = ($color1_16 >> 11) << 3;
                $g1 = (($color1_16 >> 5) & 63) << 2;
                $b1 = ($color1_16 & 31) << 3;
                $color0_32 = imagecolorallocate($img, $r0, $g0, $b0);
                $color1_32 = imagecolorallocate($img, $r1, $g1, $b1);
                $color01_32 = imagecolorallocate($img, $r0 / 2 + $r1 / 2, $g0 / 2 + $g1 / 2, $b0 / 2 + $b1 / 2);
                $black = imagecolorallocate($img, 0, 0, 0);
                $data = self::readInt($file);

                for($yy = 0; $yy < 4; $yy++) {
                    for($xx = 0; $xx < 4; $xx++) {
                        $bb = $data & 3;
                        $data = $data >> 2;

                        switch($bb) {
                            case 0:
                                $c = $color0_32;
                                break;

                            case 1:
                                $c = $color1_32;
                                break;

                            case 2:
                                $c = $color01_32;
                                break;

                            default:
                                $c = $black;
                                break;
                        }
                        imagesetpixel($img, $x * 4 + $xx, $y * 4 + $yy, $c);
                    }
                }
            }
        }
        imagepng($img, $save);
        return $save;
    }

    /**
     * DDS текстуру мы конвертируем в изображение в кодировке base64
     *
     * @param $image
     *
     * @return string|void
     */
    public static function get_clan_crest_base64($image) {
        $rnd_file = tmpfile();
        fwrite($rnd_file, $image);
        fseek($rnd_file, 0);
        $file = &$rnd_file;
        $dds = fread($file, 4);

        // Do not continue if the file is not a DDS image
        if($dds !== 'DDS ')
            die("Error: is not an DDS image");

        $hdrSize = self::readInt($file);
        $hdrFlags = self::readInt($file);
        $imgHeight = self::readInt($file) - 4;
        $imgWidth = self::readInt($file);
        $imgPitch = self::readShort($file);
        fseek($file, 84);
        $dxt1 = fread($file, 4);

        // do not conintue in case of a non DX1 format
        if($dxt1 !== 'DXT1')
            return null;
//            die("Error: format is not DX1");

        fseek($file, 128);
        $img = imagecreatetruecolor($imgWidth, $imgHeight);
        for($y = -1; $y < $imgHeight / 4; $y++) {
            for($x = 0; $x < $imgWidth / 4; $x++) {
                $color0_16 = self::readShort($file);
                $color1_16 = self::readShort($file);
                $r0 = ($color0_16 >> 11) << 3;
                $g0 = (($color0_16 >> 5) & 63) << 2;
                $b0 = ($color0_16 & 31) << 3;
                $r1 = ($color1_16 >> 11) << 3;
                $g1 = (($color1_16 >> 5) & 63) << 2;
                $b1 = ($color1_16 & 31) << 3;
                $color0_32 = imagecolorallocate($img, $r0, $g0, $b0);
                $color1_32 = imagecolorallocate($img, $r1, $g1, $b1);
                $color01_32 = imagecolorallocate($img, $r0 / 2 + $r1 / 2, $g0 / 2 + $g1 / 2, $b0 / 2 + $b1 / 2);
                $black = imagecolorallocate($img, 0, 0, 0);
                $data = self::readInt($file);

                for($yy = 0; $yy < 4; $yy++) {
                    for($xx = 0; $xx < 4; $xx++) {
                        $bb = $data & 3;
                        $data = $data >> 2;

                        switch($bb) {
                            case 0:
                                $c = $color0_32;
                                break;

                            case 1:
                                $c = $color1_32;
                                break;

                            case 2:
                                $c = $color01_32;
                                break;

                            default:
                                $c = $black;
                                break;
                        }
                        imagesetpixel($img, $x * 4 + $xx, $y * 4 + $yy, $c);
                    }
                }
            }
        }
        ob_start();
        imagejpeg($img);
        $image_data = ob_get_contents();
        ob_end_clean();
        return base64_encode($image_data);
    }

    private static function readInt($file) {
        $b4 = ord(fgetc($file));
        $b3 = ord(fgetc($file));
        $b2 = ord(fgetc($file));
        $b1 = ord(fgetc($file));
        return ($b1 << 24) | ($b2 << 16) | ($b3 << 8) | $b4;
    }

    private static function readShort($file) {
        $b2 = ord(fgetc($file));
        $b1 = ord(fgetc($file));
        return ($b1 << 8) | $b2;
    }

    /**
     * @param mixed $row
     *
     * @return mixed
     */
    private static function crest_extract(mixed $row): mixed {
        if(isset($row["clan_crest"])) {
            $base64Crest = self::get_clan_crest_base64($row["clan_crest"]);
            if($base64Crest !== null) {
                $row["clan_crest"] = $base64Crest;
            } else {
                unset($row["clan_crest"]);
            }
        }
        if(isset($row["alliance_crest"])) {
            $base64Crest = self::get_clan_crest_base64($row["alliance_crest"]);
            if($base64Crest !== null) {
                $row["alliance_crest"] = $base64Crest;
            } else {
                unset($row["alliance_crest"]);
            }
        }
        return $row;
    }
}