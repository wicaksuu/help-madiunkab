<?php
// $url = "https://absen.madiunkab.go.id/index.php/pegawai?pegawai_filter=1&max_per_page=10000";
// $url = "https://absen.madiunkab.go.id/index.php/pegawai?pegawai_filter=2&max_per_page=10000";
$url = "https://absen.madiunkab.go.id/index.php/pegawai?pegawai_filter=3&max_per_page=10000";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "Cookie: epresensi-bkdjatim=jcibltte8q2b2dj2bcjgei6q30",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

$file = fopen("dom3.html", "w");
fwrite($file, get_string_between($resp, '<tbody>', '</tbody>'));
fclose($file);

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
