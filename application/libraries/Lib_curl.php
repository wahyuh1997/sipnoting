<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/****************************************************
 *
 * Class Lib_curl
 * simple curl untuk request ke api
 *
 ****************************************************/

class Lib_curl
{

  /**
   * Request to API
   *
   * @param url 		= string  | endpoint
   * @param data 		= array
   * @param method 	= string, | GET, POST, PUT, DELETE
   * @param auth 		= boolean | TRUE -> if true the request will include JWT Token / FALSE -> if false the request will not include JWT TOKEN
   * @param curlPWD       = boolean | TRUE -> if true, will use CURLOPT_USERPWD / FALSE -> if false, will not use CURLOPT_USERPWD
   *
   * @return array | key data only
   */
  public function curl_request($url, $method = 'GET', $data = [], $auth = FALSE, $curlPWD = FALSE)
  {
    // initialize data
    $body     = json_encode($data);

    if (isset($_SESSION['pos_order']['token'])) {
      $headers  = ["Content-Type:" . "application/json", "Cache-Control: no-cache", "Authorization:Bearer " . $_SESSION['pos_order']['token']];
    } else {
      $headers  = ["Content-Type:" . "application/json", "Cache-Control: no-cache"];
    }

    // initialize curl
    $ch = curl_init();

    // preparing request
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // check if the $curlPWD is true the request will including USERPWD
    // curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60); //timeout in seconds
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // if body have value
    if (!empty($body)) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    }

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    // execute the erquest
    $response     = curl_exec($ch);
    $http_code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $clear_response = substr($response, strpos($response, "{"));
    // extract response
    //$result 	= json_decode($clear_response, true);
    //echo "<pre>";
    //var_dump($result);
    //exit();
    // check if stastus is not ok

    return json_decode($response, true);
  }
}
