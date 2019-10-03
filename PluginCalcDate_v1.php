<?php
/**
<p>
 Date calculator.
</p>
 */
class PluginCalcDate_v1{
  /**
   * Calculate years.<br>
   * @param type $date_from<br>
   * @param type $date_to<br>
   * @param type $round<br>
   * @return type<br>
   */
  public static function calcYears($date_from, $date_to = null, $round = null){
    if(!$date_from){
      return null;
    }
    if(is_null($date_to)){
      $date_to = date('Y-m-d');
    }
    $inteval = strtotime($date_to) - strtotime($date_from);
    $value = $inteval / (60*60*24*365);
    if(!$round){
      return $value;
    }else{
      return round($value, $round);
    }
  }
  /**
   * 
   * @param type $date_from
   * @param type $date_to
   * @param type $round
   */
  public static function calcMonths($date_from, $date_to = null, $round = null){
    if(!$date_from){
      return null;
    }
    if(is_null($date_to)){
      $date_to = date('Y-m-d');
    }
    $inteval = strtotime($date_to) - strtotime($date_from);
    $value = $inteval / (60*60*24*365);
    if(!$round){
      return $value;
    }else{
      return round($value, $round);
    }
  }
  /**
   * Calc seconds between $date_from and $date_to.
   * @param string $date_from
   * @param string $date_to
   * @param int $round
   * @return type
   */
  public static function calcSeconds($date_from, $date_to = null, $round = null){
    if(!$date_from){
      return null;
    }
    if(is_null($date_to)){
      $date_to = date('Y-m-d H:i:s');
    }
    $inteval = strtotime($date_to) - strtotime($date_from);
    $value = $inteval / (1);
    if(!$round){
      return $value;
    }else{
      return round($value, $round);
    }
  }
  public static function calcAll($start_date = null, $end_date = null){
    if(is_null($start_date)){
      $start_date = date('Y-m-d');
    }
    if(is_null($end_date)){
      $end_date = date('Y-m-d');
    }
    $date_diff = date_diff(date_create($start_date), date_create($end_date));
    $negative = false;
    if(date_create($start_date) > date_create($end_date)){
      $negative = true;
    }
    $result = new PluginWfArray(array(
        'start_date' => $start_date,
        'end_date' => $end_date,
        'now_date' => date('Y-m-d'),
        'negative' => $negative,
        'years' => $date_diff->format("%y"), 
        'months' => $date_diff->format("%m"), 
        'days' => $date_diff->format("%d"), 
        'hours' => $date_diff->format("%h"), 
        'minutes' => $date_diff->format("%i"), 
        'seconds' => $date_diff->format("%s"),
        'weeks' => floor((strtotime($end_date) - strtotime($start_date)) / 86400 / 7)
            ));
    $result->set('months_total', ($result->get('years')*12)+$result->get('months'));
    return $result->get();
  }
}
