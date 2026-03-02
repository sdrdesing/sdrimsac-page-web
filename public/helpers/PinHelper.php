<?php
// helpers/PinHelper.php

class PinHelper {
    // Genera un PIN numérico de 6 dígitos
    public static function generarPin($length = 6) {
        return str_pad(random_int(0, pow(10, $length)-1), $length, '0', STR_PAD_LEFT);
    }
}