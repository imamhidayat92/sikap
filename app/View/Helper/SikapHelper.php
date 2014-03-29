<?php
App::uses('AppHelper', 'View/Helper');

class SikapHelper extends AppHelper {
    public function approval_label($stat) {
        switch ($stat) {
            case -1:
                return '<span class="label bg-orange"><em>Pending</em></span>';
                break;
            case 0:
                return '<span class="label alert">Follow Up!</span>';
                break;
            case 1:
                return '<span class="label success">Diterima</span>';
                break;
            case -2:
                return '<span class="label secondary">Ditolak</span>';
                break;
        }
    }
    
    public function user_type($type_id) {
        switch ($type_id) {
            case 1:
                return 'Direktorat Pengembangan Mahasiswa';
            case 2:
                return 'Akademik';
            case 3:
                return 'Mahasiswa';
        }
    }
    
    public function generate_ip_bar($grade, $point, $total_acc) {
        return '<div style="height: 20px; width: ' . number_format($grade/4*100, 2) .'%; background-color: ' . $this->range_color($grade) . '; display: block;"><p align="center">' . number_format($grade*$point/$total_acc*100, 2). '%</p></div>';
    }
    
    public function generate_time_info($days) {
        $result = $days . " hari (";
        
        $months = $days / 30;
        
        if ($months >= 12) {
            $years = floor($months / 12);
            $result .= $years . " tahun " . $months % 12 . " bulan";
        }
        
        $result .= ")";
        
        return $result;
    }
    
    public function greet() {
        $hour = date('H');
        
        if ($hour < 11) {
            return 'pagi';
        }
        else if ($hour < 15) {
            return 'siang';
        }
        else if ($hour < 19) {
            return 'sore';
        }
        else {
            return 'malam';
        }
    }
    
    public function is_up($prev, $current) {
        if ($prev < $current) {
            return true;
        } else {
            return false;
        }
    }
    
    public function range_color($grade) {
        if ($grade >= 3) {
            return '#8CFF40';
        }
        else if ($grade >= 2) {
            return 'orange';
        }
        else {
            return 'red';
        }
    }
    
    public function up_down_indicator($prev, $current) {
        if ($prev < $current) {
            return '<span class="success label">Naik</span>';
        } else {
            return '<span class="alert label">Turun</span>';
        }        
    }
}
?>