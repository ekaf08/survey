<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\DataIndividu;
use Illuminate\Http\Request;
use App\Models\Rumahtangga;

use Symfony\Component\HttpFoundation\Response;

use App\Models\Pertanyaan;
use App\Models\SubPertanyaan;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RumahtanggaController extends Controller
{
    //
    public function showDatarumahtangga()
    {
//dd('tes');
        // $eskalasi = Incident::with('opd', 'teknisi', 'kategoris', 'operator')->where('status_terakhir', 'Eskalasi 2')->get();

    $pertanyaans = Pertanyaan::all();
    $subpertanyaans = SubPertanyaan::all();
    $idrole = Auth::user()->id_role;
    $menu   = Menu::menu_roles($idrole); 

        // $subpertanyaans = SubPertanyaan::table('sub_pertanyaans')
        //                                     ->join('pertanyaans', 'sub_pertanyaans.pertanyaan_id', '=', 'pertanyaans.id')
        //                                     ->where('')

        return view('dashboard.entridata.rumahtangga', [
        'title' => 'Survey Data Rumahtangga',
        'pertanyaans' => $pertanyaans,
        'subpertanyaans' => $subpertanyaans,
        'menu'  => $menu,
        'role' => $idrole
        ]);
       
    }





    // public function tanya1()
    // {
    //     $tny1 = DB::table('sub_pertanyaans')->where('pertanyaan_id', '2')->get();
    //     return view('dashboard.entridata.dataindividu', [
    //         'tny1' => $tny1,
    //     ]);
    // }

    public function svDatarumahtangga(Request $request)
    {
        // $request->validate([
        //     'no_kk' => 'required|regex:(357)[0-9]*/|max16',
        //     'nik' => 'required|regex:(357)[0-9]*/|max16',
        //     'nm_anggota_keluarga' => 'required',
        //     'temp_lahir' => 'required',
        //     'tgl_lahir' => 'required',
        //     // 'jen_kel' => 'required',
        // ]);

        // try {
        //     $last_incident = Incident::whereYear('created_at', date('Y'))->latest('created_at')->first()->no_insiden;
        // } catch (Exception $e) {
        //     $last_incident = 'Survey-0';
        // }
        // $no_survey = 'Survey-' . (string)((int)(preg_replace('/[^0-9]/', '', $last_incident)) + 1);

        $insDatakeluarga = Rumahtangga::create([
            
            // 'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'perekaman_koordinat' => $request->perekaman_koordinat,
            'foto_bangunan_depan' => $request->foto_bangunan_depan,
            'foto_bagian_dalam' => $request->foto_bagian_dalam,
            'foto_bagian_kloset' => $request->foto_bagian_kloset,
            'foto_dengan_responden' => $request->foto_dengan_responden,
            'foto_pengesahan_pernyataan' => $request->foto_pengesahan_pernyataan,
            'no_urut_keluarga' => $request->no_urut_keluarga,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'pengelola_makan'=> $request->pengelola_makan,
            'pengelola_makan1'=> $request->pengelola_makan1,
            'pengelola_makan2'=> $request->pengelola_makan2,
            'pengelola_makan3'=> $request->pengelola_makan3,
            'keluarga_masuk_prelist' => $request->keluarga_masuk_prelist,
            'ruta_daftar_dtms'=> $request->ruta_daftar_dtms,
            'no_urut_ruta'=> $request->no_urut_ruta,
            // 'alamat_domisili' => $request->alamat_domisili,
            // 'no_hp' => $request->no_hp,
            // 'rt_domisili' => $request->rt_domisili,
            // 'rw_domisili' => $request->rw_domisili,
            // 'kecamatan_domisili' => $request->kecamatan_domisili,
            // 'kelurahan_domisili' => $request->kelurahan_domisili,
            // 'jumlah_anggota_kel' => $request->jumlah_anggota_kel,
            // 'jumlah_keluarga' => $request->jumlah_keluarga,
            'tanggal_pencacah' => $request->tanggal_pencacah,
            'nama_pencacah' => $request->nama_pencacah,
            'tanggal_pemeriksa' => $request->tanggal_pemeriksa,
            'nama_pemeriksa' => $request->nama_pemeriksa,
            'hasil_pencacah' => $request->hasil_pencacah,  
            'tempat_tinggal' => $request->tempat_tinggal,
            'status_lahan' => $request->status_lahan,
            'biaya_pbb' => $request->biaya_pbb,
            'luas_lantai' => $request->luas_lantai,
            'jenis_lantai' => $request->jenis_lantai,
            'dinding_terluas' => $request->dinding_terluas,
            'kualitas_dinding' => $request->kualitas_dinding,
            'jenis_atap' => $request->jenis_atap,
            'kualitas_atap' => $request->kualitas_atap,
            'kamar_tidur' => $request->kamar_tidur,
            'air_minum' => $request->air_minum,
            'biaya_pdam' => $request->biaya_pdam,
            'perolehan_air_minum' => $request->perolehan_air_minum,
            'penerangan_utama' => $request->penerangan_utama,
            'daya_listrik' => $request->daya_listrik,
            'no_id_pln' => $request->no_id_pln,
            'biaya_listrik' => $request->biaya_listrik,
            'bahan_bakar_memasak' => $request->bahan_bakar_memasak,
            'biaya_gas' => $request->biaya_gas,
            'fasilitas_bab' => $request->fasilitas_bab,
            'jenis_kloset' => $request->jenis_kloset,
            'pembuangan_akhir_tinja' => $request->pembuangan_akhir_tinja,
            //'pendapatan_keluarga' => $request->pendapatan_keluarga,
            
            
            
            
            //'kepemilikan_listrik' => $request->kepemilikan_listrik,
            
            //'bukan_pln' => $request->bukan_pln,
            'kepemilikan_gas' => $request->kepemilikan_gas,
            'kepemilikan_kulkas' => $request->kepemilikan_kulkas,
            'kepemilikan_ac' => $request->kepemilikan_ac,
            'kepemilikan_pemanas_air' => $request->kepemilikan_pemanas_air,
            'kepemilikan_telepon_rumah' => $request->kepemilikan_telepon_rumah,
            'kepemilikan_tv' => $request->kepemilikan_tv,
            'kepemilikan_emas' => $request->kepemilikan_emas,
            'kepemilikan_hp' => $request->kepemilikan_hp,
            'kepemilikan_komputer' => $request->kepemilikan_komputer,
            //'kepemilikan_sepeda' => $request->kepemilikan_sepeda,
            'kepemilikan_motor' => $request->kepemilikan_motor,
            'kepemilikan_mobil' => $request->kepemilikan_mobil,
            'kepemilikan_perahu' => $request->kepemilikan_perahu,
            //'kepemilikan_motor_tempel' => $request->kepemilikan_motor_tempel,
            'kepemilikan_perahu_motor' => $request->kepemilikan_perahu_motor,
            //'kepemilikan_kapal' => $request->kepemilikan_kapal,
            'pajak_sepeda_motor' => $request->pajak_sepeda_motor,
            'berapa_motor' => $request->berapa_motor,
            'pajak_mobil' => $request->pajak_mobil,
            'berapa_mobil' => $request->berapa_mobil,
            'kepemilikan_lahan_lain' => $request->kepemilikan_lahan_lain,
            'luas_lahan_lain' => $request->luas_lahan_lain,
            'rumah_di_tempat_lain' => $request->rumah_di_tempat_lain,
            'jumlah_sapi' => $request->jumlah_sapi,
            'jumlah_kerbau' => $request->jumlah_kerbau,
            'jumlah_kuda' => $request->jumlah_kuda,
            'jumlah_babi' => $request->jumlah_babi,
            'jumlah_kambing' => $request->jumlah_kambing,
            'jumlah_ayam' => $request->jumlah_ayam,
            //'keluarga_memiliki_usaha' => $request->keluarga_memiliki_usaha,
            'angsuran_kredit_kendaraan' => $request->angsuran_kredit_kendaraan,
            'besaran_angsuran'=> $request->besaran_angsuran,
            'biaya_sampah' => $request->biaya_sampah,
            //'punya_kks' => $request->punya_kks,
            //'punya_kip' => $request->punya_kip,
            //'punya_kis' => $request->punya_kis,
            //'punya_bpjs_mandiri' => $request->punya_bpjs_mandiri,
            //'punya_jamsostek' => $request->punya_jamsostek,
            //'asuransi_kesehatan_lain' => $request->asuransi_kesehatan_lain,
            //'peserta_pkh' => $request->peserta_pkh,
            //'peserta_raskin' => $request->peserta_raskin,
            'perbaikan_rumah' => $request->perbaikan_rumah,
            'bantuan_pemakaman' => $request->bantuan_pemakaman,
            'bantuan_rumah_susun' => $request->bantuan_rumah_susun,
            'bantuan_kursi_roda' => $request->bantuan_kursi_roda,
            'bantuan_modal_usaha' => $request->bantuan_modal_usaha,
            'bantuan_becak'=> $request->bantuan_becak,
            'bantuan_sepeda_roda3' => $request->bantuan_sepeda_roda3,
            'bantuan_kaki_palsu' => $request->bantuan_kaki_palsu,
            'bantuan_gerobak' => $request->bantuan_gerobak,
            'bantuan_tempat_tidur' => $request->bantuan_tempat_tidur,
            'bantuan_bedah_rumah' => $request->bantuan_bedah_rumah,
            'peserta_kur' => $request->peserta_kur,
            
            //'jumlah_hp' => $request->jumlah_hp,
            // 'no_hp_aktif' => $request->no_hp_aktif,
            // 'tv_30_inc' => $request->tv_30_inc,
            // 'telpon_seluler_usaha' => $request->telpon_seluler_usaha,
            // 'kepemilikan_tablet' => $request->kepemilikan_tablet,
            // 'cara_sambungan_layanan' => $request->cara_sambungan_layanan,
            // 'berapa_kali_isi_pulsa_per_minggu' => $request->berapa_kali_isi_pulsa_per_minggu,
            // 'mengunjungi_blc' => $request->mengunjungi_blc,
            // 'mengunjungi_warnet_per_minggu' => $request->mengunjungi_warnet_per_minggu,
            // 'cara_memperoleh_sebagian_aset' => $request->cara_memperoleh_sebagian_aset,
            // 'aset_untuk_usaha' => $request->aset_untuk_usaha,



        ]);
            $rules = ['nik' => 'required|digits:16'
        ];

        return redirect('main/list-data-rumahtangga');
    }

    public function listDataRumahtangga()
    {
        $data_rumah_tangga = DB::table('rumahtanggas')->paginate(10);
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        return view('dashboard.main.data_rumahtangga', [
            'title' => 'Dashboard',
            'rumahtanggas' => $data_rumah_tangga,
            'menu'  => $menu,
            'role' => $idrole
        ]);
        //$string = Str::mask('nik', '*', 4, 5);
    }

    // public function ShowHideDiv() 
    // {
    //         var chkYes = document.getElementById("chkYes");
    //         var dvPassport = document.getElementById("dvPassport");
    //         dvPassport.style.display = chkYes.checked ? "block" : "none";
    // }

    // public function listDatarumahtangga()
    // {
    //     $datarumahtangga = DataRumahtangga::select('*')
    //         ->get();
    //     return view('listDatarumahtangga', ['data_rumah_tanggas' => $dataindividu]);
    // }
}
