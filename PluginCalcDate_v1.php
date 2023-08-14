<?php
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
   * @param string $date_from
   * @param string $date_to
   * @param int $round
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
        'years' => (int) $date_diff->format("%y"), 
        'months' => (int) $date_diff->format("%m"), 
        'days' => (int) $date_diff->format("%d"), 
        'hours' => (int) $date_diff->format("%h"), 
        'minutes' => (int) $date_diff->format("%i"), 
        'seconds' => (int) $date_diff->format("%s"),
        'weeks' => floor((strtotime($end_date) - strtotime($start_date)) / 86400 / 7),
        'days_total' => floor((strtotime($end_date) - strtotime($start_date)) / 86400)
            ));
    /**
     * 
     */
    $result->set('months_total', ($result->get('years')*12)+$result->get('months'));
    /**
     * calendar months
     */
    $result->set('calendar_months/years', (int) date_create($end_date)->format("y") - (int) date_create($start_date)->format("y"));
    $result->set('calendar_months/from', (int) date_create($start_date)->format("m"));
    $result->set('calendar_months/to', (int) date_create($end_date)->format("m"));
    $diff = $result->get('calendar_months/to') - $result->get('calendar_months/from');
    $result->set('calendar_months/diff', ($result->get('calendar_months/years')*12) + $diff);
    /**
     * 
     */
    $days = $result->get('days');
    if(strlen($days)==1){
      $days = '0'.$days;
    }
    $result->set('months_and_days', $result->get('months_total').','.$days);
    /**
     * months30_and_days
     */
    $temp_months = 0;
    for($i=30; $i<=$result->get('days_total'); $i=$i+30){
      $temp_months++;
    }
    $temp_days = $result->get('days_total') - ($temp_months*30);
    if(strlen($temp_days.'')==1){
      $temp_days = '0'.$temp_days;
    }
    $result->set('months30', $temp_months);
    $result->set('months30_and_days', "$temp_months,$temp_days");
    /**
     * 
     */
    return $result->get();
  }
}
