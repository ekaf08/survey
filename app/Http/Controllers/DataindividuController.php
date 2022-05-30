<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DataIndividu;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use App\Models\Pertanyaan;
use App\Models\SubPertanyaan;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DataindividuController extends Controller
{
    public function showDataIndividu()
    {

        // $eskalasi = Incident::with('opd', 'teknisi', 'kategoris', 'operator')->where('status_terakhir', 'Eskalasi 2')->get();
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);
        $pertanyaans = Pertanyaan::all();
        // $subpertanyaans = SubPertanyaan::with('pertanyaan')->where('pertanyaan_id', '1');

        // $subpertanyaans = DB::table('sub_pertanyaans')->where('pertanyaan_id', '1')->get();
        $subpertanyaans = SubPertanyaan::all();



        // $subpertanyaans = SubPertanyaan::table('sub_pertanyaans')
        //                                     ->join('pertanyaans', 'sub_pertanyaans.pertanyaan_id', '=', 'pertanyaans.id')
        //                                     ->where('')

        return view('dashboard.entridata.dataindividu', [
            'title' => 'Survey Data Individu',
            'pertanyaans' => $pertanyaans,
            'subpertanyaans' => $subpertanyaans,
            'menu'  => $menu,
            'role' => $idrole,

        ]);
    }


    public function tampilIndividu($no_kk)
    {
        $datawarga = DataWarga::select('*')->where('nik', $no_kk)->get();
        return view('dashboard.entridata.edit_dataindividu', ['datawarga' => $datawarga]);
    }


    // public function tanya1()
    // {
    //     $tny1 = DB::table('sub_pertanyaans')->where('pertanyaan_id', '2')->get();
    //     return view('dashboard.entridata.dataindividu', [
    //         'tny1' => $tny1,
    //     ]);
    // }

    public function svDataindividu(Request $request)
    {
        // dd($request->all());

        $request->validate([
            // 'noKK' => 'required|regex:/(357)[0-9]*/|max:16',
            // 'nik' => 'required|regex:/(357)[0-9]*/|max:16',
            // 'namaAnggotaKeluarga' => 'required',
            // 'hubungankplkeluarga' => 'required',
        ]);

        // try {
        //     $last_incident = Incident::whereYear('created_at', date('Y'))->latest('created_at')->first()->no_insiden;
        // } catch (Exception $e) {
        //     $last_incident = 'Survey-0';
        // }
        // $no_survey = 'Survey-' . (string)((int)(preg_replace('/[^0-9]/', '', $last_incident)) + 1);

        $insDataindividu = DataIndividu::create([
            // 'no_data_individu' => $no_survey,
            // 'no_kk' => $request->noKK,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'namaAnggotaKeluarga' => $request->namaAnggotaKeluarga,
            'hubungankplkeluarga' => $request->hubungankplkeluarga,
            'keberedaankeluarga' => $request->keberedaankeluarga,
            'nourut' => $request->nourut,
            'hubungankplrmhtangga' => $request->hubungankplrmhtangga,
            'jeniskelamin' => $request->jeniskelamin,
            'tanggallahir' => $request->tanggallahir,
            'statusperkawinan' => $request->statusperkawinan,
            'kepemilikanbukunikah' => $request->kepemilikanbukunikah,
            'tercantum_dlm_kk' => $request->tercantumdlmKK,
            'kepemilikanidentitas' => $request->kepemilikanidentitas,
            'statuskehamilan' => $request->statuskehamilan,
            'jeniscacat' => $request->jeniscacat,
            'penyakitkronis' => $request->penyakitkronis,
            'bpjsmandiri' => $request->bpjsmandiri,
            'bpjsketenagakerjaan' => $request->bpjsketenagakerjaan,
            'asuransikesehatan' => $request->asuransikesehatan,
            'jenisPMKS' => $request->jenisPMKS,
            'makananakyatim' => $request->makananakyatim,
            'makanlansia' => $request->makanlansia,
            'makandisabilitas' => $request->makandisabilitas,
            'khitan' => $request->khitan,
            'sekolah' => $request->sekolah,
            'ijazah' => $request->ijazah,
            'biayasekolah' => $request->biayasekolah,
            'seragamsekolah' => $request->seragamsekolah,
            'beasiswakuliah' => $request->beasiswakuliah,
            'bekerjaseminggu' => $request->bekerjaseminggu,
            'pekerjaanutama' => $request->pekerjaanutama,
            'aktivitas' => $request->aktivitas,
            'kedudukan' => $request->kedudukan,
            'pendapatan' => $request->pendapatan,
            'korbanPHK' => $request->korbanPHK,
            'lulusSMA' => $request->lulusSMA,
            'kb' => $request->kb,
            'rokok' => $request->rokok,
            'pendidikan' => $request->pendidikan,
            'pkarya' => $request->pkarya,
            'pelatihan' => $request->pelatihan,
            'keterampilan' => $request->keterampilan,
            'persalinan' => $request->persalinan,
            'imunisasi' => $request->imunisasi,
            'asi' => $request->asi,
            'tbparu' => $request->tbparu,
            'hipertensi' => $request->hipertensi,
            'gangguanjiwa' => $request->gangguanjiwa,
            'catatan' => $request->catatan,
            'tanggalsurvei' => $request->tanggalsurvei,
            'kelas' => $request->kelas,
            'statuspendidikan' => $request->statuspendidikan,

        ]);

        return redirect('/main/data_warga')->with('success', 'Data Berhasil Disimpan');
    }

    public function listDataIndividu()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        $data = DB::table('rumahtanggas')
            ->groupBy('id')->get();
        return view('dashboard.main.data_individu', [
            'title' => 'Tabel Survey Data Individu',
            'data' => $data,
            'menu'  => $menu,
            'role' => $idrole,
        ]);
    }
}
