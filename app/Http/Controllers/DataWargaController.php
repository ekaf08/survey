<?php

namespace App\Http\Controllers;

use App\Models\DataWarga;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;




class DataWargaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = DataWarga::where('nik', 'LIKE', '%' . $request->noKK . '%');
        } else {
            $data = DataWarga::all();
        }
    }
    public function showDataWarga()
    {
        $datawarga = DataWarga::all();
        return view('dashboard.entridata.tambah_data', [

            'title' => 'Data Warga',
            'datawarga' => $datawarga,
        ]);
    }
    // INI UNTUK VIEW DATA SIAP SURVE
    public function listSurvei()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        $datasurvei = DB::table('mbr_maret_bps')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(15);
        // $datasurvei = DataWarga::where('status_survei', 'SURVEI')->get();
        // $datasurvei = DB::table('mbr_maret_bps')->where([
        //     ['status_ekonomi', 'SANGAT_MISKIN'],
        //     ['status_keluarga', 'ADA'],
        //     ['hasil_prelist', 'SURVEI']
        // ])->paginate(15);
        return view('dashboard.main.siap_survey_warga', [
            'title' => 'Data Terpadu Masyarakat Surabaya 2022',
            'datasurvei' => $datasurvei,
            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }


    public function svDataWarga(Request $request)
    {
        DataWarga::create([
            'no_kk' => $request->noKK,
            'nik' => $request->nik,
            'nm_anggota_keluarga' => $request->namaAnggotaKeluarga,
            'alamat' => $request->alamat,
            'status_keluarga' => $request->status_keluarga,
            'status_ekonomi' => $request->status_ekonomi,
            'keterangan' => $request->keterangan,
            'catatan' => $request->catatan,
        ]);

        return redirect('/main/data_warga')->with('success', 'Data Berhasil Disimpan');
    }

    //UNTUK VIEW FORM PRELIST
    public function listDataWarga()
    {
        // $datawarga = DataWarga::where('status_survei', 'BELOM VALIDASI')->get();
        // return view('dashboard.main.validasi_data_warga', [
        //     'titile' => 'Data Warga Surabaya',
        //     'datawarga' => $datawarga,
        // // ]);
        // $users = DB::table('users')
        //         ->orderBy('name', 'desc')
        //         ->get();

        // echo Str::mask('1234567891234567', '*', 0, 12);


        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        $datawarga = DB::table('mbr_maret_bps')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', null)->orderBy('no_kk', 'asc')->paginate(15);
        return view('dashboard.main.validasi_data_warga', [
            'titile' => 'Data Warga Surabaya',
            'datawarga' => $datawarga,
            'menu'  => $menu,
            'role' => $idrole,
            // 'role' => $idrole,
            // 'nik' => Str::mask('nik', '*', 5, 12),
            $collection = collect(['no_kk']), $collection->count()
        ]);
    }

    public function tampilwarga($no_kk)
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        $datawarga = DB::table('mbr_maret_bps')->where('no_kk', $no_kk)->orderBy('no_kk', 'asc')->paginate(15);


        return view('dashboard.entridata.formvalidasi', [
            'datawarga' => $datawarga,
            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }


    // public function tampiKK($no_kk)
    // {
    //     // DataWarga::select('*')->where('no_kk', $no_kk)->get();
    //     $dataKK = DB::table('mbr_maret_bps')->where('no_kk', $no_kk);

    //     return (['dataKK' => $dataKK]);
    // }


    public function updatewarga(Request $request)
    {
        // dd($request->all());
        // $idrole = Auth::user()->id_role;
        // $menu   = Menu::menu_roles($idrole);
        // dd($request->all());
        $survey = null;

        if ($request->status_keluarga == 'ADA' and ($request->status_ekonomi == 'SANGAT MISKIN' || $request->status_ekonomi == 'MISKIN')) {
            $survey = 'SURVEI';
        } else {
            $survey = 'STOP';
        }

        // dd($request->status_keluarga,  $request->status_ekonomi, $survey);

        $datawarga = DB::table('mbr_maret_bps')->where('no_kk', $request->no_kk)
            ->update([

                // 'no_kk' => $request->no_kk,
                'status_keluarga' => $request->status_keluarga,
                'status_ekonomi' => $request->status_ekonomi,
                'hasil_prelist' => $survey,


                // 'menu'  => $menu,
                // 'role' => $idrole,
            ]);
        // dd($request->all());

        return redirect()->route('listDataWarga');
    }

    public function show_form_prelist()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        return view('dashboard.entridata.form_prelist', [

            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }

    public function tbldatawarga()
    {
        $data = DB::table('data_wargas')->orderBy('no_kk', 'asc')->get();
        return view('dashboard.main.data_individu', [
            'titile' => 'Data Warga Surabaya',
            'data' => $data,
        ]);
    }

    // public function tambah_prelist()
    // {
    // }

    public function show_form_cetak()
    {

        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        $cetak = DB::table('mbr_maret_bps')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(5);
        // $pdf = PDF::loadview('hasil_pdf', ['mbr_maret_bps' => $cetak]);

        return view('dashboard.main.form_cetak', [
            'cetak' => $cetak,
            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }

    public function cetak_pdf()
    {
        $cetak = DB::table('mbr_maret_bps')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(5);


        $pdf = PDF::loadview('cetak_pdf', ['cetak' => $cetak]);
        return $pdf->download('laporan-pegawai-pdf');
    }
}
