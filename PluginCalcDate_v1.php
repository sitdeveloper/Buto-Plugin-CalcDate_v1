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
}