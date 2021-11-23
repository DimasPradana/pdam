<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class besukiController extends Controller
{
    // {{{ construct
    function __construct()
    {
        // $this->middleware('role_or_permission:Super Admin|unitBesuki|besuki.create|besuki.read|besuki.update|besuki.delete', ['only' => ['besuki']]);

        // TODO contoh kalo ambil data dari database
        $this->UserModel = new UserModel();
    } // }}}

    // {{{ root
    public function index()
    {
        $pipa1 = self::pipa1();
        $pipa1Setengah = self::pipa1Setengah();
        $pipa2 = self::pipa2();
        $pipa3 = self::pipa3();
        $pipa4 = self::pipa4();
        $pipa6 = self::pipa6();
        $pipa8 = self::pipa8();
        $pipa12 = self::pipa12();
        $sumurboor = self::sumurboor();
        /* $pelanggan = self::pelanggan(); */
        /* dd($results); */
        /* return view('peta.test', compact('pipa1','pipa1Setengah', 'pipa2', 'pipa3','pipa4', 'pipa6', 'pipa8','pipa12', 'pelanggan')); */
        /* return view('peta.besuki', compact('pipa1','pipa1Setengah', 'pipa2', 'pipa3','pipa4', 'pipa6', 'pipa8','pipa12', 'pelanggan')); */
        return view('peta.besuki', compact('pipa1', 'pipa1Setengah', 'pipa2', 'pipa3', 'pipa4', 'pipa6', 'pipa8', 'pipa12', 'sumurboor'));
    } // }}}

    // {{{ pipa1
    public static function pipa1()
    {
        $_pipa1 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['1'])
            ->get();
        $features = [];
        foreach ($_pipa1 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa1Setengah
    public static function pipa1Setengah()
    {
        $_pipa1Setengah = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['1.5'])
            ->get();
        $features = [];
        foreach ($_pipa1Setengah as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa2
    public static function pipa2()
    {
        $_pipa2 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['2'])
            ->get();
        $features = [];
        foreach ($_pipa2 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa3
    public static function pipa3()
    {
        $_pipa3 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['3'])
            ->get();
        $features = [];
        foreach ($_pipa3 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa4
    public static function pipa4()
    {
        $_pipa4 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['4'])
            ->get();
        $features = [];
        foreach ($_pipa4 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa6
    public static function pipa6()
    {
        $_pipa6 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['6'])
            ->get();
        $features = [];
        foreach ($_pipa6 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa8
    public static function pipa8()
    {
        $_pipa8 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['8'])
            ->get();
        $features = [];
        foreach ($_pipa8 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pipa12
    public static function pipa12()
    {
        $_pipa12 = DB::table('pipa as a')
            ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            ->whereIn('ukuran_pipa', ['12'])
            ->get();
        $features = [];
        foreach ($_pipa12 as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ pelanggan
    /* public static function pelanggan(){ */
    public static function pelanggan()
    {
        $_pelanggan = DB::table('pelanggan as a')
            /* ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry") */
            ->selectRaw("a.unit, a.no_sambung, a.no_langgan, a.namapelang, a.alamat, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            /* ->limit(10) */
            ->get();
        /* dd($results); */
        $features = [];
        foreach ($_pelanggan as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ sumurboor
    public static function sumurboor()
    {
        $_sumurboor = DB::table('sumurboor as a')
            /* ->selectRaw("a.*, st_asgeojson(a.wkb_geometry) as geometry") */
            ->selectRaw("a.unit, a.nama_sumur, a.alamat_1, st_asgeojson(a.wkb_geometry) as geometry")
            ->where('unit', '=', 'BESUKI')
            /* ->limit(10) */
            ->get();
        /* dd($_sumurboor); */
        $features = [];
        foreach ($_sumurboor as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            array_push($features, $feature);
        }
        /* dd($results); */
        $featureCollection = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];
        /* dd($results); */
        return $featureCollection;
    } // }}}

    // {{{ getPelanggan
    public function getPelanggan()
    {
        $pelanggan = self::pelanggan();
        // $pelanggan2 = self::pelanggan2();
        return $pelanggan;
    } // }}}
}

// vim:fileencoding=utf-8:ft=php:foldmethod=marker
