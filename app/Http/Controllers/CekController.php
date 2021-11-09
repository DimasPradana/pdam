<?php

namespace App\Http\Controllers;

/* use Illuminate\Http\Request; */

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class CekController extends Controller
{
    function __construct()
    {
        /* $this->middleware('role_or_permission:Super Admin|create markers|read markers|update markers|delete markers', ['only' => ['semuaMarker']]); */
        /* $this->middleware('role_or_permission:Super Admin|create polygons|read polygons|update polygons|delete polygons', ['only' => ['semuaPolygon']]); */
        /* $this->middleware('role_or_permission:Super Admin|create attributes|read attributes|update attributes|delete attributes', ['only' => ['semuaAttribute']]); */
        /* $this->middleware('role_or_permission:Super Admin|roleUnit1|situbondo.create|situbondo.read|situbondo.update|situbondo.delete', ['only' => ['situbondo']]); */
        /* $this->middleware('role_or_permission:Super Admin|roleUnit2|arjasa.create|arjasa.read|arjasa.update|arjasa.delete', ['only' => ['arjasa']]); */
        /* $this->middleware('role_or_permission:Super Admin', ['only' => ['test']]); */
        /* $this->middleware('role_or_permission:kepala', ['only' => ['situbondo', 'arjasa']]); */
        /* $this->middleware('role_or_permission:Super Admin', ['situbondo', 'arjasa', 'test']); */
        /* $this->middleware('role_or_permission:Super Admin|kepala', ['situbondo', 'arjasa']); */

        // TODO contoh kalo ambil data dari database
        $this->UserModel = new UserModel();
    }

    public function index()
    {
//        return 'halo index';
//        $hasilUsers = $this->UserModel->getUser();
//        $hasilAll = $this->UserModel->getAll();
//        dd($hasilAll);
//        return view('dashboard', compact('hasilUsers'));
        return view('dashboard');
    }

//    public function semuaMarker()
//    {
//        return view('marker');
//    }
//
//    public function semuaPolygon()
//    {
//        return view('polygon');
//
//    }
//
//    public function semuaAttribute()
//    {
//        return view('attribute');
//
//    }

    public function situbondo()
    {
        return view('peta/situbondo');
    }

    public function arjasa()
    {
        return view('peta/arjasa');
    }

    public function test()
    {
        return view('peta/test');
    }

    public function testDB()
    {
        $hasils = DB::table("pipa as a")
            ->selectRaw("*, st_asgeojson(a.wkb_geometry) as geometry")
            ->where([
              ['unit', '=','SITUBONDO'],
            ])
            ->whereIn('ukuran_pipa',['1','1.5','2','3','4','6','8','12'])
            ->get();
        /* ->toSql(); */

        $features = [];
        foreach ($hasils as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                // "name" => "arjasa-pipa-pelayanan",
                "properties" => $row,
                "geometry" => $geometry,
            ];
            // echo json_encode($feature)."<br/><br/>";
            array_push($features, $feature);
        }

        /* dd($hasils); */

        $featureCollection = [
            "type" => "FeatureCollection",
            /* "name" => "arjasa-pipa-pelayanan", */
            /* "crs" => [ */
            /*   "type" => "name", */
            /*   "properties" => [ */
            /*     "name" => "urn:ogc:def:crs:OGC:1.3:CRS84", */
            /*   ], */
            /* ],  */
            "features" => $features,
        ];

        $testComment = "halo dari controller";
        return view('peta/test', compact('featureCollection', 'testComment'));
//        return $featureCollection;
    }

    public function testDB2()
    {
        $hasils = DB::table("pipapelayanan_arjasa as a")
            ->selectRaw("*, st_asgeojson(a.wkb_geometry) as geometry")
            ->get();
        /* ->toSql(); */

        $features = [];
        foreach ($hasils as $row) {
            unset($row->wkb_geometry);
            $geometry = $row->geometry = json_decode($row->geometry);
            unset($row->geometry);
            $feature = [
                "type" => "Feature",
                /* "name" => "arjasa-pipa-pelayanan", */
                "properties" => $row,
                "geometry" => $geometry,
            ];
            /* echo json_encode($feature)."<br/><br/>"; */
            array_push($features, $feature);
        }

        /* dd($hasils); */

        $featureCollection = [
            "type" => "FeatureCollection",
            /* "name" => "arjasa-pipa-pelayanan", */
            /* "crs" => [ */
            /*   "type" => "name", */
            /*   "properties" => [ */
            /*     "name" => "urn:ogc:def:crs:OGC:1.3:CRS84", */
            /*   ], */
            /* ],  */
            "features" => $features,
        ];

        return $featureCollection;
//        return $featureCollection;
    }
}
