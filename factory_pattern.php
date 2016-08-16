<?php
/*工厂模式主要用来解决当我们使用抽象类的时候，及时的实例化对象的问题*/
/*在这里CommonManager类负责生成具体的对象 gaos add this 2016.08.16*/
abstract class DataSended(){
  abstract function encode(){}
}

class JsonEncode extends DataSended{
  private $arr;
  function __construct($arr){$this->arr = $arr;}
  function encode(){
    return json_encode($arr);
  };
}

class XmlEncode extens DataSended{
  function encode(){
    return "xml字符串组装中.....";
  }
}

class CommonManager{
  const JSON=1;
  const XML = 2;
  private $mode=1;  
  function __construct($mode){
    $this->mode=$mode;
  }

  function getEncoder(){
    switch ($this->mode){
      case (self::JSON):
        return new JsonEncode();
      case (self::XML):
        return new XmlEncode();
    }
  }
}
$comms = new CommonManager(CommonManager XML);
$appEncoder = $comms->getEncoder();
print $appEncoder->encode();
