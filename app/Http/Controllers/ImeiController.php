<?php

namespace App\Http\Controllers;

use App\Models\Cooker;
use App\Models\imei;
use App\Models\User;
use Illuminate\Http\Request;

class ImeiController extends Controller
{
    //
    public function index()
    {
        return view('landing');
    }

    public function ceknip(Request $request)
    {
        $data = $request->all();
        $userData = Imei::where('nip', $data['nip'])->first();
        if ($userData != '') {
            if ($userData['status'] == '') {
                return response()->json(['success' => true, 'message' => 'NIP dalam proses peresetan']);
            } else {
                return response()->json(['success' => true, 'message' => 'NIP sudah pernah melakukan peresetan.']);
            }
        } else {
            // cek nik di aplikasi

            $userData = Cooker::where('nip', $data['nip'])->first();
            return response()->json(['success' => true, 'nama' => $userData['nama'], 'opd' => $userData['opd'], 'userid' => $userData['userid']]);
        }
    }


    public function save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        try {
            Imei::create($data);
            $message = ['success' => true];
            return redirect()->back()->with('success', 'Data telah terkirim, mohon tunggu peresetan !!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function imei(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // total number of rows per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Imei::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Imei::select('count(*) as allcount')->where('nama', 'like', '%' . $searchValue . '%')->count();

        // Get records, also we have included search filter as well
        $records = Imei::orderBy($columnName, $columnSortOrder)
            ->where('imeis.nama', 'like', '%' . $searchValue . '%')
            ->orWhere('imeis.opd', 'like', '%' . $searchValue . '%')
            ->orWhere('imeis.nip', 'like', '%' . $searchValue . '%')
            ->orWhere('imeis.userid', 'like', '%' . $searchValue . '%')
            ->orWhere('imeis.id', 'like', '%' . $searchValue . '%')
            ->select('imeis.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            if ($record->status == '') {
                $status = '<button type="button" class="btn btn-sm btn-danger" disabled>Not verif</button>';
                $aksi = '<a href="reset/' . $record->id . '/' . $record->userid . '" class="btn btn-sm btn-warning " role="button" >Reset</a>';
            } else {
                $status = '<button type="button" class="btn btn-sm btn-success" disabled>Verifed</button>';
                if ($record->status != '') {
                    $aksi   = '<button type="button" class="btn btn-sm btn-success" disabled>' . $record->status . '</button>';
                }
            }
            $data_arr[] = array(
                "id" => $record->id,
                "nama" => $record->nama,
                "opd" => $record->opd,
                "alasan" => $record->alasan,
                "status" => $status,
                "nip" => $record->nip,
                "userid" => $record->userid,
                "action" => $aksi
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        echo json_encode($response);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        if (isset($data['token'])) {
            if ($data['token'] == 'Jack03061997') {
                $save = $data['data'];
                foreach ($save as $value) {
                    try {
                        Cooker::create($value);
                        $message[] = ['success' => true, 'data' => $value];
                    } catch (\Throwable $th) {
                        $message[] = ['error' => $th->getMessage(), 'data' => $value];
                    }
                }

                echo json_encode($message);
            }
        }
    }

    public function dashboard()
    {

        $userData = User::where('id', 1)->first();
        $cookie = $userData->cookie;
        if (ceklogin($cookie) == true) {
            return view('dashboard', ['status' => true]);
        } else {
            return view('dashboard', ['status' => false]);
        }
    }


    public function reset($id, $userid)
    {
        $userData = User::where('id', 1)->first();
        $cookie   = $userData->cookie;
        if (ceklogin($cookie) == true) {
            imei::find($id)->update(['status' => 'Reset']);
            reset_data($userid, $cookie);
            return redirect()->back()->with('success', 'Data telah tereset');
        } else {

            return redirect()->back()->with('error', 'Data tidak tereset cookie bermasalah');
        }
    }
}

function reset_data($userid, $cookie)
{
    $url = 'https://absen.madiunkab.go.id/index.php/pegawai/' . $userid . '/reset';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Cookie: epresensi-bkdjatim=$cookie",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $resp = curl_exec($curl);
    curl_close($curl);
    return;
}

function ceklogin($cookie)
{
    $url = "https://absen.madiunkab.go.id/index.php/users";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Cookie: epresensi-bkdjatim=$cookie",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $resp = curl_exec($curl);
    curl_close($curl);
    if (preg_match("/Download Aplikasi/i", $resp)) {
        return false;
    } else {
        return true;
    }
}
function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
