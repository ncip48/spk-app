<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use stdClass;

class MAUTController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();

        //olah data karyawan setiap atribut
        //kehadiran max 20 dan jadikan antara 0-1 dan ambil 1 angka dibelakang koma
        //kemampuan, kinerja, keaktifan, kontribusi max 100 dan jadikan antara 0-1 dan ambil 1 angka dibelakang koma
        //hitung cuti max 12 dan jadikan antara 0-1 jika cuti banyak maka nilai sedikit dan ambil 1 angka dibelakang koma

        foreach ($karyawans as $karyawan) {
            $alternatif = new stdClass();
            $alternatif->kehadiran = round($karyawan->kehadiran / 20, 1);
            $alternatif->kemampuan = round($karyawan->kemampuan / 100, 1);
            $alternatif->kinerja = round($karyawan->kinerja / 100, 1);
            $alternatif->keaktifan = round($karyawan->keaktifan / 100, 1);
            $alternatif->kontribusi = round($karyawan->kontribusi / 100, 1);
            $alternatif->cuti = round((12 - $karyawan->cuti) / 12, 1);

            $karyawan->alternatif = $alternatif;
        }

        //set bobot
        $bobot = new stdClass();
        $bobot->kehadiran = 0.3;
        $bobot->kemampuan = 0.15;
        $bobot->kinerja = 0.25;
        $bobot->keaktifan = 0.05;
        $bobot->kontribusi = 0.15;
        $bobot->cuti = 0.10;
        $bobot->total = $bobot->kehadiran + $bobot->kemampuan + $bobot->kinerja + $bobot->keaktifan + $bobot->kontribusi + $bobot->cuti;

        //normalisasi matriks dengan rumus UX = X - Xmin / Xmax - Xmin
        //mencari nilai max dan min dari setiap atribut
        $max = new stdClass();

        $max->kehadiran = $karyawans->max('alternatif.kehadiran');
        $max->kemampuan = $karyawans->max('alternatif.kemampuan');
        $max->kinerja = $karyawans->max('alternatif.kinerja');
        $max->keaktifan = $karyawans->max('alternatif.keaktifan');
        $max->kontribusi = $karyawans->max('alternatif.kontribusi');
        $max->cuti = $karyawans->max('alternatif.cuti');

        //mencari nilai min dari setiap atribut
        $min = new stdClass();

        $min->kehadiran = $karyawans->min('alternatif.kehadiran');
        $min->kemampuan = $karyawans->min('alternatif.kemampuan');
        $min->kinerja = $karyawans->min('alternatif.kinerja');
        $min->keaktifan = $karyawans->min('alternatif.keaktifan');
        $min->kontribusi = $karyawans->min('alternatif.kontribusi');
        $min->cuti = $karyawans->min('alternatif.cuti');

        //normalisasi matriks
        foreach ($karyawans as $karyawan) {
            $normalisasi = new stdClass();
            $normalisasi->kehadiran = round(($karyawan->alternatif->kehadiran - $min->kehadiran) / ($max->kehadiran - $min->kehadiran), 3);
            $normalisasi->kemampuan = round(($karyawan->alternatif->kemampuan - $min->kemampuan) / ($max->kemampuan - $min->kemampuan), 3);
            $normalisasi->kinerja = round(($karyawan->alternatif->kinerja - $min->kinerja) / ($max->kinerja - $min->kinerja), 3);
            $normalisasi->keaktifan = round(($karyawan->alternatif->keaktifan - $min->keaktifan) / ($max->keaktifan - $min->keaktifan), 3);
            $normalisasi->kontribusi = round(($karyawan->alternatif->kontribusi - $min->kontribusi) / ($max->kontribusi - $min->kontribusi), 3);
            $normalisasi->cuti = round(($karyawan->alternatif->cuti - $min->cuti) / ($max->cuti - $min->cuti), 3);

            $karyawan->normalisasi = $normalisasi;
        }

        //menghitung vx = Wi * bobot
        foreach ($karyawans as $karyawan) {
            $vx = new stdClass();
            $vx->kehadiran = round($karyawan->normalisasi->kehadiran * $bobot->kehadiran, 3);
            $vx->kemampuan = round($karyawan->normalisasi->kemampuan * $bobot->kemampuan, 3);
            $vx->kinerja = round($karyawan->normalisasi->kinerja * $bobot->kinerja, 3);
            $vx->keaktifan = round($karyawan->normalisasi->keaktifan * $bobot->keaktifan, 3);
            $vx->kontribusi = round($karyawan->normalisasi->kontribusi * $bobot->kontribusi, 3);
            $vx->cuti = round($karyawan->normalisasi->cuti * $bobot->cuti, 3);
            $vx->total = round($vx->kehadiran + $vx->kemampuan + $vx->kinerja + $vx->keaktifan + $vx->kontribusi + $vx->cuti, 3);

            $karyawan->vx = $vx;
        }

        //menghitung total vx
        foreach ($karyawans as $karyawan) {
            $karyawan->total = round($karyawan->vx->kehadiran + $karyawan->vx->kemampuan + $karyawan->vx->kinerja + $karyawan->vx->keaktifan + $karyawan->vx->kontribusi + $karyawan->vx->cuti, 3);
        }

        //menghitung ranking dengan angka
        foreach ($karyawans as $karyawan) {
            $karyawan->ranking = $karyawans->where('total', '>', $karyawan->total)->count() + 1;
        }

        //menghitung ranking dengan total vx
        // $karyawans = $karyawans->sortByDesc('total');

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Daftar data karyawan',
        //     'data' => [
        //         'karyawan' => $karyawans,
        //         'bobot' => $bobot,
        //         'max' => $max,
        //         'min' => $min
        //     ]
        // ], 200);

        return view('maut.index', compact('karyawans', 'bobot', 'max', 'min'));
    }
}
