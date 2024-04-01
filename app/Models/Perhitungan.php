<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\LokasiWisata;
use App\Models\SubKriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\LokasiWisataSubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perhitungan extends Model
{
    use HasFactory;

    public function validator()
    {
        $lokasi_wisata_get = LokasiWisata::with(['lokasi_wisata_sub_kriteria.kriteria'])->get();
        $kriteria_get = Kriteria::get();
        $sub_kriteria_get = SubKriteria::get();
        $kecamatan_get = Kecamatan::get();
        $kelurahan_get = Kelurahan::get();

        $pesan = '';
        $valid = true;

        if (count($lokasi_wisata_get) < 1) {
            $valid = false;
            $pesan = 'Lokasi wisata tidak ada!';
        }

        if (count($kriteria_get) < 1) {
            $valid = false;
            $pesan = 'Kriteria tidak ada!';
        }

        if (count($sub_kriteria_get) < 1) {
            $valid = false;
            $pesan = 'Sub Kriteria tidak ada!';
        }

        if (count($kecamatan_get) < 1) {
            $valid = false;
            $pesan = 'Kecamatan tidak ada!';
        }

        if (count($kelurahan_get) < 1) {
            $valid = false;
            $pesan = 'Kelurahan tidak ada!';
        }

        foreach ($lokasi_wisata_get as $key_lokasi_wisata_get => $value_lokasi_wisata_get) {

            $i = 0;
            foreach ($value_lokasi_wisata_get->lokasi_wisata_sub_kriteria as $key_lokasi_wisata_get_sub_kriteria => $value_key_lokasi_wisata_get_sub_kriteria) {

                if ($value_key_lokasi_wisata_get_sub_kriteria->kriteria->bobot_perhitungan !== 'JSK') {

                    foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                        if ($value_kriteria_get->bobot_perhitungan !== 'JSK') {

                            if ($value_key_lokasi_wisata_get_sub_kriteria->kriteria_id == $value_kriteria_get->id) {

                                $i++;

                            }

                        }

                    }

                }

            }

            $jumlah_JSK = 0;
            foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                if ($value_kriteria_get->bobot_perhitungan == 'JSK') {

                    $jumlah_JSK++;

                }

            }

            if ($i !== (count($kriteria_get) - $jumlah_JSK)) {

                $valid = false;
                $pesan = 'Lengkapi Sub Kriteria Lokasi Wisata ' . $value_lokasi_wisata_get->nama . ' terlebih dahulu!';
                break;

            }
            break;
        }

        $return = [$valid, $pesan];

        return $return;
    }

    public function electre()
    {
        $lokasi_wisata_get = LokasiWisata::with(['lokasi_wisata_sub_kriteria.kriteria.kriteria_sub_kriteria', 'lokasi_wisata_sub_kriteria.sub_kriteria.kriteria_sub_kriteria'])->get();
        $kriteria_get = Kriteria::get();
        $sub_kriteria_get = SubKriteria::get();
        $lokasi_wisata_sub_kriteria_get = LokasiWisataSubKriteria::with(['kriteria', 'sub_kriteria'])->get();
        $kriteria_sub_kriteria_get = KriteriaSubKriteria::get();

        $main_array = [];
        foreach ($lokasi_wisata_get as $key_lokasi_wisata_get => $value_lokasi_wisata_get) {

            $main_array[$key_lokasi_wisata_get]['lokasi_wisata'] = [
                'id' => $value_lokasi_wisata_get->id,
                'nama' => $value_lokasi_wisata_get->nama
            ];

        }

        $i = 0;

        //membentuk perbandingan berpasangan
        foreach ($lokasi_wisata_get as $key_lokasi_wisata_get => $value_lokasi_wisata_get) {

            $i_BSK = 0;
            $i_JSK = 0;
            foreach ($value_lokasi_wisata_get->lokasi_wisata_sub_kriteria as $key_lokasi_wisata_sub_kriteria => $value_lokasi_wisata_sub_kriteria) {

                if ($value_lokasi_wisata_sub_kriteria->kriteria->bobot_perhitungan == 'BSK') {

                    $temp = [];

                    foreach ($value_lokasi_wisata_sub_kriteria->kriteria->kriteria_sub_kriteria as $key_kriteria_sub_kriteria => $value_kriteria_sub_kriteria) {

                        if ($value_lokasi_wisata_sub_kriteria->sub_kriteria->id == $value_kriteria_sub_kriteria->sub_kriteria_id) {
                            $temp = $value_kriteria_sub_kriteria->bobot;
                        }

                    }

                    $main_array[$key_lokasi_wisata_get]['kriteria_sub_kriteria']['BSK'][$i_BSK] = [
                        'kriteria_id' => $value_lokasi_wisata_sub_kriteria->kriteria->id,
                        'kriteria_nama' => $value_lokasi_wisata_sub_kriteria->kriteria->nama,
                        'sub_kriteria_id' => $value_lokasi_wisata_sub_kriteria->sub_kriteria->id,
                        'sub_kriteria_nama' => $value_lokasi_wisata_sub_kriteria->sub_kriteria->nama,
                        'bobot' => $temp
                    ];

                    $i_BSK++;

                } elseif ($value_lokasi_wisata_sub_kriteria->kriteria->bobot_perhitungan == 'JSK') {

                    $temp = [];

                    foreach ($value_lokasi_wisata_sub_kriteria->kriteria->kriteria_sub_kriteria as $key_kriteria_sub_kriteria => $value_kriteria_sub_kriteria) {

                        if ($value_lokasi_wisata_sub_kriteria->sub_kriteria->id == $value_kriteria_sub_kriteria->sub_kriteria_id) {
                            $temp = $value_kriteria_sub_kriteria->bobot;
                        }

                    }

                    $main_array[$key_lokasi_wisata_get]['kriteria_sub_kriteria']['JSK'][$i_JSK] = [
                        'kriteria_id' => $value_lokasi_wisata_sub_kriteria->kriteria->id,
                        'kriteria_nama' => $value_lokasi_wisata_sub_kriteria->kriteria->nama,
                        'sub_kriteria_id' => $value_lokasi_wisata_sub_kriteria->sub_kriteria->id,
                        'sub_kriteria_nama' => $value_lokasi_wisata_sub_kriteria->sub_kriteria->nama,
                        'bobot' => $temp
                    ];

                    $i_JSK++;

                }

            }

        }

        foreach ($main_array as $key_main_array => $value_main_array) {

            foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                if ($value_kriteria_get->bobot_perhitungan == "JSK") {

                    $temp = 0;
                    foreach ($value_main_array['kriteria_sub_kriteria']['JSK'] as $key_JSK => $value_JSK) {

                        if ($value_JSK['kriteria_id'] == $value_kriteria_get->id) {

                            $temp = $temp + $value_JSK['bobot'];

                        }

                    }

                    $main_array[$key_main_array]['kriteria_sub_kriteria_fix'][$key_kriteria_get] = [
                        'kriteria_id' => $value_kriteria_get->id,
                        'kriteria_nama' => $value_kriteria_get->nama,
                        'kriteria_bobot' => $temp,
                        'bobot_pembagi' => 0,
                        'bobot_ternormalisasi' => 0,
                        'bobot_referensi' => 0
                    ];

                } elseif ($value_kriteria_get->bobot_perhitungan == "BSK") {

                    $temp = 0;
                    foreach ($value_main_array['kriteria_sub_kriteria']['BSK'] as $key_BSK => $value_BSK) {

                        if ($value_BSK['kriteria_id'] == $value_kriteria_get->id) {

                            $temp = $temp + $value_BSK['bobot'];

                        }

                    }

                    $main_array[$key_main_array]['kriteria_sub_kriteria_fix'][$key_kriteria_get] = [
                        'kriteria_id' => $value_kriteria_get->id,
                        'kriteria_nama' => $value_kriteria_get->nama,
                        'kriteria_bobot' => $temp,
                        'bobot_pembagi' => 0,
                        'bobot_ternormalisasi' => 0,
                        'bobot_referensi' => 0
                    ];

                }

            }

        }

        foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

            $pembagi = 0;
            foreach ($main_array as $key_main_array => $value_main_array) {

                foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                    if ($value_kriteria_sub_kriteria_fix['kriteria_id'] == $value_kriteria_get->id) {

                        $pembagi = $pembagi + ($value_kriteria_sub_kriteria_fix['kriteria_bobot'] ** 2);

                    }

                }

            }

            foreach ($main_array as $key_main_array => $value_main_array) {

                foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                    $main_array[$key_main_array]['kriteria_sub_kriteria_fix'][$key_kriteria_get]['bobot_pembagi'] = sqrt($pembagi);

                }

            }

        }

        //perbandingan berpasangan ternormalisasi
        foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

            $pembagi = 0;
            foreach ($main_array as $key_main_array => $value_main_array) {

                foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                    if ($value_kriteria_sub_kriteria_fix['kriteria_id'] == $value_kriteria_get->id) {

                        $main_array[$key_main_array]['kriteria_sub_kriteria_fix'][$key_kriteria_get]['bobot_ternormalisasi'] = $value_kriteria_sub_kriteria_fix['kriteria_bobot'] / $value_kriteria_sub_kriteria_fix['bobot_pembagi'];

                    }

                }

            }

        }

        //membentuk matiks referensi
        foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

            $pembagi = 0;
            foreach ($main_array as $key_main_array => $value_main_array) {

                foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                    if ($value_kriteria_sub_kriteria_fix['kriteria_id'] == $value_kriteria_get->id) {

                        $main_array[$key_main_array]['kriteria_sub_kriteria_fix'][$key_kriteria_get]['bobot_referensi'] = $value_kriteria_sub_kriteria_fix['bobot_ternormalisasi'] * $value_kriteria_get->bobot_referensi;

                    }

                }

            }

        }

        // dd($main_array);

        //menentukan concordance index
        $concordance_arr = [];
        foreach ($main_array as $key_main_array => $value_main_array) {

            foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                foreach ($main_array as $key_main_array_2 => $value_main_array_2) {

                    foreach ($value_main_array_2['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix_2 => $value_kriteria_sub_kriteria_fix_2) {

                        if ($value_kriteria_sub_kriteria_fix['bobot_referensi'] == $value_kriteria_sub_kriteria_fix_2['bobot_referensi'] || $value_kriteria_sub_kriteria_fix['bobot_referensi'] > $value_kriteria_sub_kriteria_fix_2['bobot_referensi']) {

                            foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                                if ($value_kriteria_sub_kriteria_fix['kriteria_id'] == $value_kriteria_get->id && $value_kriteria_sub_kriteria_fix_2['kriteria_id'] == $value_kriteria_get->id) {

                                    if ($key_main_array == $key_main_array_2) {
                                        $concordance_arr['A' . $key_main_array + 1]['A' . $key_main_array_2 + 1][0] = '-';
                                    } else {
                                        $concordance_arr['A' . $key_main_array + 1]['A' . $key_main_array_2 + 1][$key_kriteria_get] = $key_kriteria_get + 1;
                                    }

                                }

                            }

                        }


                    }

                }

            }

        }

        // dd($concordance_arr);

        //menentukan discordance index
        $discordance_arr = [];
        foreach ($main_array as $key_main_array => $value_main_array) {

            foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix => $value_kriteria_sub_kriteria_fix) {

                foreach ($main_array as $key_main_array_2 => $value_main_array_2) {

                    foreach ($value_main_array_2['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria_fix_2 => $value_kriteria_sub_kriteria_fix_2) {

                        if ($value_kriteria_sub_kriteria_fix['bobot_referensi'] < $value_kriteria_sub_kriteria_fix_2['bobot_referensi']) {

                            foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                                if ($value_kriteria_sub_kriteria_fix['kriteria_id'] == $value_kriteria_get->id && $value_kriteria_sub_kriteria_fix_2['kriteria_id'] == $value_kriteria_get->id) {

                                    if ($key_main_array == $key_main_array_2) {
                                        $discordance_arr['A' . $key_main_array + 1]['A' . $key_main_array_2 + 1][0] = '-';
                                    } else {
                                        $discordance_arr['A' . $key_main_array + 1]['A' . $key_main_array_2 + 1][$key_kriteria_get] = $key_kriteria_get + 1;
                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

        //membentuk matriks concordance 
        $matrix_concordance_arr = [];
        foreach ($concordance_arr as $key_concordance_arr => $value_concordance_arr) {

            foreach ($concordance_arr as $key_concordance_arr_2 => $value_concordance_arr_2) {

                if (isset($concordance_arr[$key_concordance_arr][$key_concordance_arr_2])) {

                    $temp = 0;
                    foreach ($concordance_arr[$key_concordance_arr][$key_concordance_arr_2] as $key_concordance_1_2 => $value_concordance_1_2) {

                        foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                            if ($key_kriteria_get + 1 == $value_concordance_1_2) {

                                $temp = $temp + $value_kriteria_get->bobot_referensi;

                            }

                        }

                    }

                    $matrix_concordance_arr[$key_concordance_arr][$key_concordance_arr_2] = $temp;

                }

            }

        }

        //total matriks concordance
        $total_matrix_concordance = [];
        $total_value_matrix_concordance = 0;
        $i = 1;
        foreach ($matrix_concordance_arr as $key_matrix_concordance_arr => $value_matrix_concordance_arr) {

            $total_matrix_concordance[$key_matrix_concordance_arr] = 0;

            $j = 1;
            foreach ($matrix_concordance_arr as $key_matrix_concordance_arr_2 => $value_matrix_concordance_arr_2) {

                if (is_numeric($matrix_concordance_arr[$key_matrix_concordance_arr_2][$key_matrix_concordance_arr])) {

                    $total_matrix_concordance[$key_matrix_concordance_arr] = $total_matrix_concordance[$key_matrix_concordance_arr] + $matrix_concordance_arr[$key_matrix_concordance_arr_2][$key_matrix_concordance_arr];

                } else {

                    $total_matrix_concordance[$key_matrix_concordance_arr] = $total_matrix_concordance[$key_matrix_concordance_arr] + 0;

                }

                $j++;
            }

            $total_value_matrix_concordance = $total_value_matrix_concordance + $total_matrix_concordance[$key_matrix_concordance_arr];

            $i++;
        }

        $treshold_concordance = $total_value_matrix_concordance / (count($lokasi_wisata_get) * (count($lokasi_wisata_get) - 1));

        //membentuk matriks referensi
        $arr_matriks_referensi = [];
        foreach ($main_array as $key_main_array => $value_main_array) {

            foreach ($value_main_array['kriteria_sub_kriteria_fix'] as $key_kriteria_sub_kriteria => $value_kriteria_sub_kriteria) {

                foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {
                    // dd($value_kriteria_sub_kriteria);
                    if ($value_kriteria_sub_kriteria['kriteria_id'] == $value_kriteria_get->id) {

                        $arr_matriks_referensi['A' . $key_main_array + 1]['C' . $key_kriteria_get + 1] = $value_kriteria_sub_kriteria['bobot_referensi'];

                    }

                }

            }

        }

        //membentuk temp kriteria dan temp pembagi

        //discordance array
        $temp_pembagi_all_kriteria = [];
        $temp_all_kriteria_max_fix = [];
        $temp_max_kriteria_choosen_fix = [];
        foreach ($discordance_arr as $key_discordance_arr => $value_discordance_arr) {

            $i_discordance_all_kriteria = 0;
            $i_discordance_arr_kriteria_choosen = 0;

            foreach ($discordance_arr as $key_discordance_arr_2 => $value_discordance_arr_2) {

                if (isset($discordance_arr[$key_discordance_arr][$key_discordance_arr_2])) {

                    //kriteria terpilih
                    $i_temp_kriteria_choosen = 0;
                    $temp_max_kriteria_choosen = [];
                    foreach ($discordance_arr[$key_discordance_arr][$key_discordance_arr_2] as $key_discordance_1_2 => $value_discordance_1_2) {

                        $temp_max_kriteria_choosen[$i_temp_kriteria_choosen] = abs($arr_matriks_referensi[$key_discordance_arr]['C' . $value_discordance_1_2] - $arr_matriks_referensi[$key_discordance_arr_2]['C' . $value_discordance_1_2]);

                        $temp_max_kriteria_choosen_fix[$key_discordance_arr][$key_discordance_arr_2] = max($temp_max_kriteria_choosen);
                        $i_temp_kriteria_choosen++;
                    }

                    //semua kriteria
                    $i_pembagi_all_kriteria = 0;
                    $temp_max_all_kriteria = [];

                    while ($i_pembagi_all_kriteria <= $i_discordance_all_kriteria) {

                        $x = 0;
                        $temp_max_all_kriteria = [];
                        foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                            $temp_pembagi_all_kriteria[$key_discordance_arr][$key_discordance_arr_2][$key_kriteria_get][$i_pembagi_all_kriteria] = $arr_matriks_referensi[$key_discordance_arr_2]['C' . $key_kriteria_get + 1] - $arr_matriks_referensi[$key_discordance_arr]['C' . $key_kriteria_get + 1];

                            $temp_max_all_kriteria[$key_kriteria_get] = abs(max($temp_pembagi_all_kriteria[$key_discordance_arr][$key_discordance_arr_2][$key_kriteria_get]));
                            $x++;
                        }

                        $i_pembagi_all_kriteria++;

                    }


                    $temp_all_kriteria_max_fix[$key_discordance_arr][$key_discordance_arr_2] = max($temp_max_all_kriteria);

                    // if ($key_discordance_arr == 'A3' && $key_discordance_arr_2 == 'A4') {

                    //     dd($temp_all_kriteria_max_fix);

                    // }

                }

                $i_discordance_all_kriteria++;
                $i_discordance_arr_kriteria_choosen++;

            }

        }

        // dd($temp_all_kriteria_max_fix);

        //membentuk matriks discordance
        $matrix_discordance_arr = [];
        foreach ($discordance_arr as $key_discordance_arr => $value_discordance_arr) {

            foreach ($discordance_arr as $key_discordance_arr_2 => $value_discordance_arr_2) {

                if (isset($discordance_arr[$key_discordance_arr][$key_discordance_arr_2])) {

                    $matrix_discordance_arr[$key_discordance_arr][$key_discordance_arr_2] = $temp_max_kriteria_choosen_fix[$key_discordance_arr][$key_discordance_arr_2] / $temp_all_kriteria_max_fix[$key_discordance_arr][$key_discordance_arr_2];

                } else {

                    $matrix_discordance_arr[$key_discordance_arr][$key_discordance_arr_2] = '-';

                }

            }

        }

        // dd($matrix_discordance_arr);

        //total matriks discordance
        $total_matrix_discordance = [];
        $total_value_matrix_discordance = 0;
        $i = 1;
        foreach ($matrix_discordance_arr as $key_matrix_discordance_arr => $value_matrix_discordance_arr) {

            $total_matrix_discordance[$key_matrix_discordance_arr] = 0;

            $j = 1;
            foreach ($matrix_discordance_arr as $key_matrix_discordance_arr_2 => $value_matrix_discordance_arr_2) {

                if (is_numeric($matrix_discordance_arr[$key_matrix_discordance_arr_2][$key_matrix_discordance_arr])) {

                    $total_matrix_discordance[$key_matrix_discordance_arr] = $total_matrix_discordance[$key_matrix_discordance_arr] + $matrix_discordance_arr[$key_matrix_discordance_arr_2][$key_matrix_discordance_arr];

                } else {

                    $total_matrix_discordance[$key_matrix_discordance_arr] = $total_matrix_discordance[$key_matrix_discordance_arr] + 0;

                }

                $j++;
            }

            $total_value_matrix_discordance = $total_value_matrix_discordance + $total_matrix_discordance[$key_matrix_discordance_arr];

            $i++;
        }

        $treshold_discordance = $total_value_matrix_discordance / (count($lokasi_wisata_get) * (count($lokasi_wisata_get) - 1));

        // dd($treshold_discordance);

        //matriks F concordance
        $matrix_f_concordance = [];
        foreach ($matrix_concordance_arr as $key_matrix_concordance_arr => $value_matrix_concordance_arr) {

            foreach ($matrix_concordance_arr as $key_matrix_concordance_arr_2 => $value_matrix_concordance_arr_2) {

                if ($matrix_concordance_arr[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] !== 0) {

                    if ($matrix_concordance_arr[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] >= $treshold_concordance) {

                        $matrix_f_concordance[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] = 1;

                    } elseif ($matrix_concordance_arr[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] < $treshold_concordance) {
                        $matrix_f_concordance[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] = 0;
                    }

                } elseif ($key_matrix_concordance_arr == $key_matrix_concordance_arr_2) {

                    $matrix_f_concordance[$key_matrix_concordance_arr][$key_matrix_concordance_arr_2] = '-';

                }

            }

        }

        //total matriks F concordance
        $total_matrix_f_concordance = [];
        $i = 1;
        foreach ($matrix_f_concordance as $key_matrix_f_concordance => $value_matrix_f_concordance) {

            $total_matrix_f_concordance[$key_matrix_f_concordance] = 0;

            $j = 1;
            foreach ($matrix_f_concordance as $key_matrix_f_concordance_2 => $value_matrix_discordance_arr_2) {

                if (is_numeric($matrix_f_concordance[$key_matrix_f_concordance_2][$key_matrix_f_concordance])) {

                    $total_matrix_f_concordance[$key_matrix_f_concordance] = $total_matrix_f_concordance[$key_matrix_f_concordance] + $matrix_f_concordance[$key_matrix_f_concordance_2][$key_matrix_f_concordance];

                } else {

                    $total_matrix_f_concordance[$key_matrix_f_concordance] = $total_matrix_f_concordance[$key_matrix_f_concordance] + 0;

                }

                $j++;
            }

            $i++;
        }

        // dd($total_matrix_f_concordance);

        //matriks G discordance
        $matrix_g_discordance = [];
        foreach ($matrix_discordance_arr as $key_matrix_discordance_arr => $value_matrix_discordance_arr) {

            foreach ($matrix_discordance_arr as $key_matrix_discordance_arr_2 => $value_matrix_concordance_arr_2) {

                if ($matrix_discordance_arr[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] !== 0) {

                    if ($matrix_discordance_arr[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] >= $treshold_discordance) {

                        $matrix_g_discordance[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] = 1;

                    } elseif ($matrix_discordance_arr[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] < $treshold_discordance) {
                        $matrix_g_discordance[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] = 0;
                    }

                } elseif ($key_matrix_discordance_arr == $key_matrix_discordance_arr_2) {

                    $matrix_g_discordance[$key_matrix_discordance_arr][$key_matrix_discordance_arr_2] = '-';

                }

            }

        }

        //total matriks G discordance
        $total_matrix_g_discordance = [];
        $i = 1;
        foreach ($matrix_g_discordance as $key_matrix_g_discordance => $value_matrix_g_discordance) {

            $total_matrix_g_discordance[$key_matrix_g_discordance] = 0;

            $j = 1;
            foreach ($matrix_g_discordance as $key_matrix_g_discordance_2 => $value_matrix_discordance_arr_2) {

                if (is_numeric($matrix_g_discordance[$key_matrix_g_discordance_2][$key_matrix_g_discordance])) {

                    $total_matrix_g_discordance[$key_matrix_g_discordance] = $total_matrix_g_discordance[$key_matrix_g_discordance] + $matrix_g_discordance[$key_matrix_g_discordance_2][$key_matrix_g_discordance];

                } else {

                    $total_matrix_g_discordance[$key_matrix_g_discordance] = $total_matrix_g_discordance[$key_matrix_g_discordance] + 0;

                }

                $j++;
            }

            $i++;

        }

        // dd($matrix_f_concordance);

        //matriks eliminasi alternatif
        $matriks_eliminasi_alternatif = [];
        $total_matriks_eliminasi_alternatif = [];
        $i = 0;
        foreach ($matrix_g_discordance as $key_matrix_g_discordance => $value_matrix_g_discordance) {

            $total_matriks_eliminasi_alternatif[$i]['total'] = 0;

            foreach ($matrix_g_discordance as $key_matrix_g_discordance_2 => $value_matrix_discordance_arr_2) {

                if (is_numeric($matrix_g_discordance[$key_matrix_g_discordance][$key_matrix_g_discordance_2]) && is_numeric($matrix_f_concordance[$key_matrix_g_discordance][$key_matrix_g_discordance_2])) {

                    $matriks_eliminasi_alternatif[$key_matrix_g_discordance][$key_matrix_g_discordance_2] = $matrix_g_discordance[$key_matrix_g_discordance][$key_matrix_g_discordance_2] * $matrix_f_concordance[$key_matrix_g_discordance][$key_matrix_g_discordance_2];

                    // if ($key_matrix_g_discordance == 'A3' && $key_matrix_g_discordance_2 == 'A5') {

                    //     dd($matriks_eliminasi_alternatif[$key_matrix_g_discordance][$key_matrix_g_discordance_2]);

                    // }

                    $total_matriks_eliminasi_alternatif[$i]['total'] = $total_matriks_eliminasi_alternatif[$i]['total'] + $matriks_eliminasi_alternatif[$key_matrix_g_discordance][$key_matrix_g_discordance_2];
                    $total_matriks_eliminasi_alternatif[$i]['index'] = $key_matrix_g_discordance;

                } else {

                    $matriks_eliminasi_alternatif[$key_matrix_g_discordance][$key_matrix_g_discordance_2] = '-';

                }

            }

            $i++;

        }

        //penggabungan alternatif dan perhitungan
        foreach ($lokasi_wisata_get as $key_lokasi_wisata_get => $value_lokasi_wisata_get) {

            $total_matriks_eliminasi_alternatif[$key_lokasi_wisata_get]['lokasi_wisata'] = [

                'lokasi_wisata_id' => $value_lokasi_wisata_get->id,
                'lokasi_wisata_nama' => $value_lokasi_wisata_get->nama

            ];

        }

        // dd($total_matriks_eliminasi_alternatif);
        $rank_matriks_eliminasi_alternatif = $this->bubble_sort_dengan_index($total_matriks_eliminasi_alternatif, 'total');

        return $rank_matriks_eliminasi_alternatif;
    }

    function bubble_sort_dengan_index($arr, $key)
    {

        $size = count($arr) - 1;

        for ($i = 0; $i < $size; $i++) {

            for ($j = 0; $j < $size - $i; $j++) {

                $k = $j + 1;

                if ($arr[$k][$key] > $arr[$j][$key]) {

                    list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);

                }

            }

        }

        return $arr;

    }

    // function bubble_sort($arr)
    // {
    //     $x = 0;
    //     foreach ($arr as $item => $value) {
    //         $size = count($arr[$x]['sub_kriteria']) - 1;
    //         for ($i = 0; $i < $size; $i++) {
    //             for ($j = 0; $j < $size - $i; $j++) {
    //                 $k = $j + 1;
    //                 if ($arr[$x]['sub_kriteria'][$k]['bobot'] > $arr[$x]['sub_kriteria'][$j]['bobot']) {
    //                     // Swap elements at indices: $j, $k
    //                     list($arr[$x]['sub_kriteria'][$j], $arr[$x]['sub_kriteria'][$k]) = array($arr[$x]['sub_kriteria'][$k], $arr[$x]['sub_kriteria'][$j]);
    //                 }
    //             }
    //         }
    //         $x++;
    //     }

    //     $result = [];
    //     $i = 0;
    //     foreach ($arr as $key => $value) {
    //         $result[$i]['kriteria']['kriteria_id'] = $value['kriteria_id'];
    //         $result[$i]['kriteria']['nama'] = $value['kriteria'];
    //         // $result[$i]['kriteria']['bobot'] = $value['bobot'];

    //         $result[$i]['kriteria']['sub_kriteria']['max'] = reset($value['sub_kriteria']);
    //         $result[$i]['kriteria']['sub_kriteria']['min'] = end($value['sub_kriteria']);
    //         $i++;
    //     }
    //     // dd($result);

    //     return [$result];
    // }

}