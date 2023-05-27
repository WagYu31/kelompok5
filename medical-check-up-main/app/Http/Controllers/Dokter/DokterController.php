<?php

namespace App\Http\Controllers\Dokter;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CatatanKeperawatanPasien;
use App\Models\Pembayaran;

class DokterController extends Controller
{
    public function dashboard() {
        return view('dokter.dashboard');
    }

    public function data_pasien() {
        $data['title']  = 'Menu Data Pasien';
        $data['pasien'] = Pasien::all();
        return view('dokter.data-pasien', $data);
    }

    public function data_pasien_create() {
        $data['title'] = 'Tambah Data Pasien';
        return view('dokter.data-pasien-add', $data);
    }

    public function data_pasien_store(Request $request) {
        dd($request->all());
        $data = new Pasien;
        $data->number_register = 'REG-'.date("dmYhis");
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        dd($data);
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_edit($id) {
        $data['title']  = 'Ubah Data Pasien';
        $data['pasien'] = Pasien::where('id', $id)->first();
        $data['noted'] = CatatanKeperawatanPasien::where('pasien_id', $id)->first();
        $data['payment'] = Pembayaran::where('pasien_id', $id)->first();
        return view('dokter.data-pasien-edit', $data);
    }

    public function data_pasien_update(Request $request) {
        $data = Pasien::where('id', $request->id)->first();
        $data->name = $request->name;
        $data->nik = $request->nik;
        $data->birthday = date('d/m/Y', strtotime($request->birthday));
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->phone = $this->gantiformat($request->phone);
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_noted(Request $request) {
        $data = CatatanKeperawatanPasien::where('pasien_id', $request->pasien_id)->first();
        if (empty($data)) {
            $data = new CatatanKeperawatanPasien;
        }
        $data->pasien_id = $request->pasien_id;
        $data->tanggal_berobat = date('d/m/Y', strtotime($request->tanggal_berobat));
        $data->resep_obat = $request->resep_obat;
        $data->diagnosa_dokter = $request->diagnosa_dokter;
        $data->catatan_dokter = $request->catatan_dokter;
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_payment(Request $request) {
        $data = Pembayaran::where('pasien_id', $request->pasien_id)->first();
        if (empty($data)) {
            $data = new Pembayaran;
        }
        $data->pasien_id = $request->pasien_id;
        $data->biaya_konsuktasi = $request->biaya_konsuktasi;
        $data->biaya_perawatan = $request->biaya_perawatan;
        $data->biaya_resep_obat = $request->biaya_resep_obat;
        $data->save();
        return redirect()->back();
    }

    public function data_pasien_delete(Request $request) {
        $data = Pasien::where('id', $request->id)->first();
        $data->delete();
        return redirect()->back();
    }

    public function gantiformat($nomorhp) {
        $nomorhp = trim($nomorhp);
        $nomorhp = strip_tags($nomorhp);
        $nomorhp= str_replace(" ","",$nomorhp);
        $nomorhp= str_replace("(","",$nomorhp);
        $nomorhp= str_replace(".","",$nomorhp);

        if(!preg_match('/[^+0-9]/',trim($nomorhp))){
            if(substr(trim($nomorhp), 0, 3)=='+62'){
                $nomorhp= trim($nomorhp);
            }
            elseif(substr($nomorhp, 0, 1)=='0'){
                $nomorhp= '+62'.substr($nomorhp, 1);
            }
        }
        return $nomorhp;
    }
}
