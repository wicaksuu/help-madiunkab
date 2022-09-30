<?php
require 'lib.php';

$fh = fopen("dom3.html", "r");
while (!feof($fh)) {
    $line = fgets($fh);
    $dump[] = $line;
    if (preg_match("</tr>", $line)) {
        $saver[] = implode($dump);
        unset($dump);
    }
}

fclose($fh);
$i = 0;
foreach ($saver as $tag) {
    $html = str_get_html($tag);
    foreach ($html->find('tr') as $tr) {
        foreach ($tr->find('td') as $td) {
            $input =  $td->find('input', 0);
            if (isset($input->value)) {
                $dump['userid'] = $input->value;
            }
        }

        $nip =  $tr->find('td[class=sf_admin_text sf_admin_list_td_nip]', 0);
        $nama =  $tr->find('td[class=sf_admin_text sf_admin_list_td_nama]', 0);
        $opd =  $tr->find('td[class=sf_admin_foreignkey sf_admin_list_td_departemen]', 0);
        if (isset($nip->innertext)) {
            $dump['nip'] = trim(preg_replace('/\t+/', '', $nip->innertext));
        }
        if (isset($nama->innertext)) {
            $dump['nama'] = trim(preg_replace('/\t+/', '', $nama->innertext));
        }
        if (isset($opd->innertext)) {
            $dump['opd'] = trim(preg_replace('/\t+/', '', $opd->innertext));
        }
        $i++;
        echo "$i. " . $dump['nip'] . "\n";
        $data[] = $dump;
    }
}
$save['data'] = $data;
// print_r($data);
// die;
$save['token'] = 'Jack03061997';
$url = "http://localhost:8000/update";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($save));

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

/**
 * 
 * intinya ada tracking pada hp yang digunakan tiap 5 menit 
 * apabila dalam pemantauan ada hp yang stuck atau tidak ada mobilitas maka akan di blokir sehingga hp tidak dapat digunakan
 * sistem akan memblokir otomatis apabila hp yang digunakan tidak bergrak lebih dalam radius yang telah ditetapkan
 * pergantian imei hanya satu kali apabila lebih maka harus di ajukan melalui surat resmi diketahui oleh kepala OPD
 * 
 * 
 */
