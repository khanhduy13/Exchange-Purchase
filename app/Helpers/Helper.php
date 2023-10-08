<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{


    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
    public static function trangthai($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-warning btn-xs" style="font-size:13px">CHỜ DUYỆT</span>'
            : ($trangthai == 1 ? '<span class="btn btn-success btn-xs" style="font-size:13px">ĐÃ DUYỆT</span>'
                : '<span class="btn btn-danger btn-xs" style="font-size:13px">TỪ CHỐI DUYỆT</span>');
    }
    public static function trangthai1($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-warning btn-xs">Chưa chấp nhân</span>'
            : ($trangthai == 1 ? '<span class="btn btn-success btn-xs">Chấp nhận</span>'
                : '<span class="btn btn-danger btn-xs">Từ chối</span>');
    }
    public static function trangthai2($trangthai = 0): string
    {
        return $trangthai == 0 ? '<span class="btn btn-warning btn-xs">Chưa chấp nhân</span>'
            : ($trangthai == 1 ? '<span class="btn btn-success btn-xs" style="font-size:12px">Thành công</span>'
                : '<span class="btn btn-danger btn-xs">Thất bại</span>');
    }
    public static function price($gia)
    {
        return number_format($gia);
    }
}
