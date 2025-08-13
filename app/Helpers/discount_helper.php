<?php

function get_discount($jenjang, $kategori_pelajar)
{
    switch ($kategori_pelajar) {
        case 'calon_pegawai_pelajar':
            if($jenjang == 'doktor'){
                return [
                    '1' => '50%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                    '5' => '50%',
                    '6' => '50%'
                ];
            }
            if($jenjang == 'magister'){
                return [
                    '1' => '50%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                ];
            }
            break;

        case 'on_going_pegawai_pelajar':
            if($jenjang == 'doktor'){
                return [
                    '1' => '50%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                    '5' => '50%',
                    '6' => '50%'
                ];
            }
            if($jenjang == 'magister'){
                return [
                    '1' => '50%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                ];
            }
            break;

        case 'pegawai_mitra_kerja':
                if($jenjang == 'doktor'){
                return [
                    '1' => '',
                    '2' => '',
                    '3' => '',
                    '4' => '',
                    '5' => '',
                    '6' => ''
                ];
            }
            if($jenjang == 'magister'){
                return [
                    '1' => '',
                    '2' => '',
                    '3' => '',
                    '4' => '',
                ];
            }
            break;

        case 'alumni_terbaik_ulm':
            if($jenjang == 'doktor'){
                return [
                    '1' => '100%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                    '5' => '50%',
                    '6' => '50%'
                ];
            }
            if($jenjang == 'magister'){
                return [
                    '1' => '100%',
                    '2' => '50%',
                    '3' => '50%',
                    '4' => '50%',
                ];
            }
            break;

        case 'alumni_predikat_pujian_ulm':
            if($jenjang == 'doktor'){
                return [
                    '1' => '50%',
                    '2' => '30%',
                    '3' => '30%',
                    '4' => '30%',
                    '5' => '30%',
                    '6' => '30%'
                ];
            }
            if($jenjang == 'magister'){
                return [
                    '1' => '50%',
                    '2' => '30%',
                    '3' => '30%',
                    '4' => '30%',
                ];
            }
            break;

        default:
            return null;
    }
}

