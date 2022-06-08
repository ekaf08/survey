<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\DataWarga;

class TambahData extends Component
{

    public function FormCoba()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole);

        return view('dashboard.livewire.tambah-data', [
            'title' => 'Survey Data Individu',

            'menu'  => $menu,
            'role' => $idrole,

        ]);
    }


    public $data_wargas, $nik, $nama, $hub_keluarga;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInputFields()
    {
        $this->nik = '';
        $this->nama = '';
        $this->hub_keluarga = '';
    }

    public function store()
    {
        $validateDate = $this->validate(
            [
                'nik.0' => 'required',
                'nama.0' => 'required',
                'hub_keluarga.0' => 'required',
                'nik.*' => 'required',
                'nama.*' => 'required',
                'hub_keluarga.*' => 'required',
            ],
            [
                'nik.0.required' => 'Nik Tidak Boleh Kosong',
                'nama.0.required' => 'Nama Tidak Boleh Kosong',
                'hub_keluarga.0.required' => 'Hubungan Keluarga Harus Di Isi',
                'nik.*.required' => 'Nik Tidak Boleh Kosong',
                'nama.*.required' => 'Nama Tidak Boleh Kosong',
                'hub_keluarga.*.required' => 'Hubungan Keluarga Harus Di Isi',
            ]
        );

        foreach ($this->nik as $key => $value) {
            DataWarga::create([
                'no_kk' => $this->no_kk[$key],
                'nik' => $this->nik[$key],
                'nama' => $this->nama[$key],
                'hub_keluarga' => $this->hub_keluarga[$key],
                'alamat' => $this->alamat[$key],
                'no_rw' => $this->no_rw[$key],
                'no_rt' => $this->no_rt[$key],
                'kecamatan' => $this->kecamatan[$key],
                'kelurahan' => $this->kelurahan[$key],
                'periode' => $this->periode[$key],
                'tahun' => $this->tahun[$key],
                // 'status_keluarga' => $this->status_keluarga[$key],
                // 'status_ekonomi' => $this->status_ekonomi[$key],
                // 'hasil_prelist' => $this->hasil_prelist[$key],
                // 'catatan' => $this->catatan[$key],
                // 'no_prelist' => $this->no_prelist[$key],
            ]);
        }
        $this->inputs = [];
        $this->resetInputFields();

        return redirect()->route('listDataWarga');
        // session()->flash('message', 'Account Added Successfully.');
    }

    public function render()
    {
        $data = DataWarga::all();
        return view('livewire.tambah-data');
    }
}
