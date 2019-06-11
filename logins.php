<?php

// membaca username dari form login
$nip = $_POST['username'];
// membaca password dari form login

// membuat URL GET request ke sistem A
$api='12345';
$url = "http://192.168.88.145:8080/master/services.php?nip=".$nip."&api=".$api;
echo $url;
 
// mengirim GET request ke sistem A dan membaca respon XML dari sistem A
#$bacaxml = simplexml_load_file($url);
 
// membaca data XML hasil dari respon sistem A
#foreach($bacaxml->response as $respon)
#{
// jika responnya TRUE maka login sukses
// jika FALSE maka login gagal
#if ($respon == "TRUE") echo "Login Sukses";
#else if ($respon == "FALSE") echo "Login Gagal";
#} 
//$client = curl_init($url);
//curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
//$content=curl_exec($client);
//$content='{"result":"Success","nama":"NORIANDINI DEWI SALYASARI"}';

//$content = file_get_contents($url);
$content = file_get_contents("http://192.168.88.21:8080/master/services.php?nip=".$nip."&api=".$api);
//$content = utf8_encode($content);
//$content = trim(file_get_contents("http://192.168.88.21:8080/master/services.php?nip=".$nip."&api=".$api), "\xEF\xBB\xBF");
//$json = json_decode($content,true);
print_r($content);
//echo $content['nama'];
//print_r($json);
//$result=json_decode($response);
//header('Content-Type: application/json');
//echo $json[0]['result'];
 
?>