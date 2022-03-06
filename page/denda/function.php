<?php 
function terlambat($tgl_dateline, $tgl_kembali) {

    $tgl_dateline_pcs = explode("-", $tgl_dateline);
    $tgl_dateline_pcs = $tgl_dateline_pcs[2]."-".$tgl_dateline_pcs[1]."-".$tgl_dateline_pcs[0];


    $tgl_kembali_pcs = explode("-", $tgl_kembali);
    $tgl_kembali_pcs = $tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0]; 


    $selisih = strtotime($tgl_kembali_pcs) - strtotime($tgl_dateline_pcs);
    $selisih = $selisih / 86400;

    if ($selisih >= 1) {
        $tgl_hasil = floor($selisih);
    } else {
        $tgl_hasil = 0;
    }
        return $tgl_hasil;
    }
