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
use Carbon\Carbon;




// namespace App\Http\Livewire;

// use App\Http\Livewire\Controller;
// use Livewire\Component;
// use Illuminate\Http\Request;


class DataWargaController extends Controller
{

    public function index(Request $request)
    {
        return view('dashboard.main.validasi-data-warga');
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

        $datasurvei = DB::table('data_wargas')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(15);
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
        dd($request->all());

        // $last_incident = DataWarga::whereYear('created_at', date('Y'))->latest('id')->first();
        // if (empty($last_incident)) {
        //     $last_incident = 'INS-0';
        // } else {
        //     $last_incident = $last_incident->no_insiden;
        // }
        // $curr_incident = 'INS-' . (string)((int)(preg_replace('/[^0-9]/', '', $last_incident)) + 1);
        // dd($curr_incident);

        DataWarga::create([
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'hub_keluarga' => $request->hub_keluarga,
            'alamat' => $request->alamat,
            'no_rw' => $request->no_rw,
            'no_rt' => $request->no_rt,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'periode' => $request->periode,
            'tahun' => $request->tahun,
            'status_keluarga' => $request->status_keluarga,
            'status_ekonomi' => $request->status_ekonomi,
            'hasil_prelist' => $request->hasil_prelist,
            'catatan' => $request->catatan,
            'no_prelist' => $request->no_prelist,
            'created_at' => $request->tanggal,
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

        $datawarga = DB::table('data_wargas')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', null)->orderBy('no_kk', 'asc')->paginate(15);
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

        $datawarga = DB::table('data_wargas')->where('no_kk', $no_kk)->orderBy('no_kk', 'asc')->paginate(15);


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
        // $last_incident = Incident::whereYear('created_at', date('Y'))->latest('id')->first();
        // if (empty($last_incident)) {
        //     $last_incident = 'INS-0';
        // } else {
        //     $last_incident = $last_incident->no_insiden;
        // }
        // $curr_incident = 'INS-' . (string)((int)(preg_replace('/[^0-9]/', '', $last_incident)) + 1);

        // buat nomer prelist
        // $results = DB::select('select * from users where id = :id', ['id' => 1]);

        // $results = DB::select('SELECT "max"(no_prelist) FROM data_wargas WHERE no_prelist NOTNULL ');

        $no_urutakhir = Datawarga::whereYear('created_at', date('Y'))->latest('id')->first();
        // $no_urutakhir = null;
        if (empty($no_urutakhir)) {
            $no_urutakhir = 'DTMS-0';
        } else {
            $no_urutakhir = $no_urutakhir->no_prelist;
        }
        $no_urut = 'DTMS-' . (string)((int)(preg_replace('/[^0-9]/', '', $no_urutakhir)) + 1);



        // pengecekan data warga sebelum prelist
        $survey = null;
        if ($request->status_keluarga == 'ADA' and ($request->status_ekonomi == 'SANGAT MISKIN' || $request->status_ekonomi == 'MISKIN')) {
            $survey = 'SURVEI';
        } else {
            $survey = 'STOP';
        }

        // dd($request->status_keluarga,  $request->status_ekonomi, $survey, $no_urut);

        // dd($request->no_kk,  $request->status_keluarga,  $request->status_ekonomi, $survey, $no_urut,  $request->catatan,);
        // update ke tabel mbr_maret_bps
        $datawarga = DB::table('data_wargas')->where('no_kk', $request->no_kk)->update([
            'status_keluarga' => $request->status_keluarga,
            'status_ekonomi' => $request->status_ekonomi,
            'hasil_prelist' => $survey,
            'catatan' => $request->catatan,
            'no_prelist' => $no_urut,
            // 'menu'  => $menu,
            // 'role' => $idrole,
        ]);
        // dd($request->no_kk,  $request->status_keluarga,  $request->status_ekonomi, $survey, $no_urut,  $request->catatan,);
        // dd($request->all());

        return redirect()->route('listDataWarga')->with('success', 'Data Berhasil Disimpan');
    }

    public function show_form_prelist()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        [$date, $time] = getDateAndTime();


        return view('dashboard.entridata.form_prelist', [

            'menu' => $menu,
            'role' => $idrole,
            'date' => $date,
            'time' => $time,
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

        $cetak = DB::table('data_wargas')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(5);
        // $pdf = PDF::loadview('hasil_pdf', ['mbr_maret_bps' => $cetak]);

        return view('dashboard.main.form_cetak', [
            'cetak' => $cetak,
            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }

    public function cetak_pdf()
    {
        $cetak = DB::table('data_wargas')->where('hub_keluarga', 'KEPALA KELUARGA')->where('status_keluarga', 'ADA')->where('hasil_prelist', 'SURVEI')->paginate(5);


        $pdf = PDF::loadview('cetak_pdf', ['cetak' => $cetak]);
        return $pdf->download('laporan-pegawai-pdf');
    }


    private function hitung_umur($tanggal_lahir)
    {
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        $y = 0;
        if ($birthDate > $today) {
            $y = 0;
        } else {
            $y = $today->diff($birthDate)->y;
        }
        return $y;
    }









    //############################################### COBA LIVEWIRE #################################

    // public function FormCoba()
    // {
    //     $idrole = Auth::user()->id_role;
    //     $menu   = Menu::menu_roles($idrole);

    //     return view('dashboard.livewire.tambah-data', [
    //         'title' => 'Survey Data Individu',

    //         'menu'  => $menu,
    //         'role' => $idrole,

    //     ]);
    // }



    // public $data_wargas, $nik, $nama, $hub_keluarga;
    // public $updateMode = false;
    // public $inputs = [];
    // public $i = 1;


    // public function add($i)
    // {
    //     $i = $i + 1;
    //     $this->i = $i;
    //     array_push($this->inputs, $i);
    // }

    // public function remove($i)
    // {
    //     unset($this->inputs[$i]);
    // }

    // public function resetInputFields()
    // {
    //     $this->nik = '';
    //     $this->nama = '';
    //     $this->hub_keluarga = '';
    // }

    // public function store()
    // {
    //     $validateDate = $this->validate(
    //         [
    //             'nik.0' => 'required',
    //             'nama.0' => 'required',
    //             'hub_keluarga.0' => 'required',
    //             'nik.*' => 'required',
    //             'nama.*' => 'required',
    //             'hub_keluarga.*' => 'required',
    //         ],
    //         [
    //             'nik.0.required' => 'Nik Tidak Boleh Kosong',
    //             'nama.0.required' => 'Nama Tidak Boleh Kosong',
    //             'hub_keluarga.0.required' => 'Hubungan Keluarga Harus Di Isi',
    //             'nik.*.required' => 'Nik Tidak Boleh Kosong',
    //             'nama.*.required' => 'Nama Tidak Boleh Kosong',
    //             'hub_keluarga.*.required' => 'Hubungan Keluarga Harus Di Isi',
    //         ]
    //     );

    //     foreach ($this->nik as $key => $value) {
    //         DataWarga::create([
    //             'no_kk' => $this->no_kk[$key],
    //             'nik' => $this->nik[$key],
    //             'nama' => $this->nama[$key],
    //             'hub_keluarga' => $this->hub_keluarga[$key],
    //             'alamat' => $this->alamat[$key],
    //             'no_rw' => $this->no_rw[$key],
    //             'no_rt' => $this->no_rt[$key],
    //             'kecamatan' => $this->kecamatan[$key],
    //             'kelurahan' => $this->kelurahan[$key],
    //             'periode' => $this->periode[$key],
    //             'tahun' => $this->tahun[$key],
    //             // 'status_keluarga' => $this->status_keluarga[$key],
    //             // 'status_ekonomi' => $this->status_ekonomi[$key],
    //             // 'hasil_prelist' => $this->hasil_prelist[$key],
    //             // 'catatan' => $this->catatan[$key],
    //             // 'no_prelist' => $this->no_prelist[$key],
    //         ]);
    //     }
    //     $this->inputs = [];
    //     $this->resetInputFields();

    //     return redirect()->route('listDataWarga');
    //     // session()->flash('message', 'Account Added Successfully.');
    // }

    // public function render()
    // {
    //     $data = DataWarga::all();
    //     return view('livewire.tambah-data');
    // }

    //############################################### COBA LIVEWIRE #################################
}
