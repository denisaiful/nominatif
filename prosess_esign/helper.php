<?php
// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

function CallAPIVerifyNik($method, $url, $data = false)
{
    // $curl = curl_init();

    // switch ($method)
    // {
    //     case "POST":
    //         curl_setopt($curl, CURLOPT_POST, 1);

    //         $boundary = uniqid();
    //         $delimiter = '-------------' . $boundary;
    //         $headers = array("Content-Type:multipart/form-data; boundary=".$delimiter); //----------------------------4ebf00fbcf09"); // cURL headers for file uploading
    //         // curl_setopt($curl, CURLOPT_HEADER, true);
    //         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    //         curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);

    //         if ($data)
    //             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //         break;
    //     case "PUT":
    //         curl_setopt($curl, CURLOPT_PUT, 1);
    //         break;
    //     default:
    //         if ($data)
    //             $url = sprintf("%s?%s", $url, http_build_query($data));
    // }

    // // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "mahisa:123abc"); //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);    

    // $result = curl_exec($curl);

    // curl_close($curl);

    // return $result;
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Authorization: Basic ZXNpZ246cXdlcnR5', //di postman ini basic auth, username esign, password qwerty
        'Cookie: JSESSIONID=29A651D0C62D50D68930B6C7A5640767'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    //echo $response;
    return $response;
}

function CallAPISign($method, $url, $data = false, $filename_pdf)
{
    // $curl = curl_init();

    // switch ($method)
    // {
    //     case "POST":
    //         curl_setopt($curl, CURLOPT_POST, 1);

    //         $boundary = uniqid();
    //         $delimiter = '-------------' . $boundary;
    //         $headers = array("Content-Type:multipart/form-data; boundary=".$delimiter); //----------------------------4ebf00fbcf09"); // cURL headers for file uploading
    //         // curl_setopt($curl, CURLOPT_HEADER, true);
    //         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    //         curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);

    //         if ($data)
    //             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    //         break;
    //     case "PUT":
    //         curl_setopt($curl, CURLOPT_PUT, 1);
    //         break;
    //     default:
    //         if ($data)
    //             $url = sprintf("%s?%s", $url, http_build_query($data));
    // }

    // // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "mahisa:123abc"); //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // // setting option nama file hasil unduhan 
	// //$rand = uniqid();
	// //$file_ttd = $rand."-".$filename_pdf;
    // /* $filename = "../sertifikat/signed/" .$filename_pdf; */ //"../sertifikat/signed/sertifikat-".uniqid().".pdf";
    // $filename = $_SERVER['DOCUMENT_ROOT']."/sertifikat/signed/" .$filename_pdf;
	// $fp = fopen($filename, 'wb');
    // curl_setopt($curl, CURLOPT_FILE, $fp);
	
	// //echo "<script>alert('tes helper'); </script>";

    // $result = curl_exec($curl);
	// $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
	// //$header = substr($response, 0, $header_size);
	// $body = substr($result, $header_size);
	// $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	// // Then, after your curl_exec call:
	


    // curl_close($curl);
	// /* echo "<script>alert('".$httpcode."'); </script>";
	// echo "<script>alert('".$filename."'); </script>";
	// echo "<script>alert('".$body."'); </script>"; */
	// return array($httpcode,$filename_pdf,$body); 
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: multipart/form-data',
    'Authorization: Basic ZXNpZ246cXdlcnR5',
    'Cookie: JSESSIONID=29A651D0C62D50D68930B6C7A5640767'
  ),
));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
$result = curl_exec($curl);
$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$body = substr($result, $header_size);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$filename = $_SERVER['DOCUMENT_ROOT']."/sertifikat/signed/" .$filename_pdf;
$fp = fopen($filename, 'wb');
curl_setopt($curl, CURLOPT_FILE, $fp);
//curl_close($curl);
// echo $result;
file_put_contents($filename, $result);
// echo "<script>alert('".$data['linkQR']."'); </script>";
// echo "<script>alert('".$httpcode."'); </script>";
// echo "<script>alert('".$filename."'); </script>";
// echo "<script>alert('".$result."'); </script>";
return array($httpcode,$filename_pdf,$body); 
}


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            $boundary = uniqid();
            $delimiter = '-------------' . $boundary;
            $headers = array("Content-Type:multipart/form-data; boundary=".$delimiter); //----------------------------4ebf00fbcf09"); // cURL headers for file uploading
            // curl_setopt($curl, CURLOPT_HEADER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "mahisa:123abc"); //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // setting option nama file hasil unduhan 
    $filename = "signed/sertifikat-".uniqid().".pdf";
    $fp = fopen($filename, 'wb');
    curl_setopt($curl, CURLOPT_FILE, $fp);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}


function test() {
    return "test123";
}

?>