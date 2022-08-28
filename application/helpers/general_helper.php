<?php




function trace($value)
{
  echo "<pre>";
  var_dump($value);
  exit();
}

/**
 * Decription
 * Check for the value if null or not
 *
 * @param string / int
 * @return string / int
 */

function check_null($value)
{
  if ($value == null) {
    $res = ($value == null  ? '-' : $value);
  } else {
    $res = ($value == ''  ? null : $value);
  }


  return $res;
}

/**
 * Print checklist or not
 */

function check_bool_icon($value)
{
  if ($value == 0) {
    $icon = '<i class="fa fa-close text-danger"></i>';
  } else if ($value == 1) {
    $icon = '<i class="fa fa-check text-success"></i>';
  } else {
    $icon = '???';
  }

  return $icon;
}

/**
 * Default currency format
 *
 * @return float
 */

function currency_format($value)
{
  return number_format($value, 2, ".", ",");
}

/***********************************************************************************
 * Description
 * Get Indonesia Date Format
 * 
 * Parameter
 * $date = date
 * 
 ***********************************************************************************/

function datetime_to_date($datetime)
{
  $explode = explode(' ', $datetime);
  return $explode[0];
}

function dateNumber($date)
{
  if ($date == '-') {
    return $date;
    exit();
  }

  $date     = explode(' ', $date)[0];
  $time     = gmdate($date, time() + 60 * 60 * 8);
  $explode  = explode("-", $time);
  $day      = $explode[2];
  $month    = $explode[1];
  $year     = substr($explode[0], -2);
  return $month . '/' . $day . '/' . $year;
}

function dateFormat($date)
{
  if ($date == '-') {
    return $date;
    exit();
  }

  $date  = explode(' ', $date)[0];
  $time   = gmdate($date, time() + 60 * 60 * 8);
  $explode  = explode("-", $time);
  $day      = $explode[2];
  $month    = month($explode[1]);
  $year     = $explode[0];
  return $day . ' ' . $month . ' ' . $year;
}


function timeFormat($date)
{
  $time  = explode(' ', $date)[1];
  return $time;
}

function month($month)
{
  switch ($month) {
    case 1:
      return "Januari";
      break;
    case 2:
      return "February";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}
