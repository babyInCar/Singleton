class Preferences{
  /*The core thought of the Singleton is to private the construct method*/
  private $props = array();
  private static  $_instance;
  private function __construct()
  {
  }
  
  public static function getInstance(){
    if(empty(self::$_instance)){
      self::$_instance=self::Preference();
    }
    return self::$_instance;
  }
  
  public static function setProperty($key,$val){
    $props[$key]=$val;
  }
  
  public static function getProperty(){
    return $this->$props[$key];
  }
  
}
$pref1=Preferences::getInstance();
$pref1->setProperty("age",26);

