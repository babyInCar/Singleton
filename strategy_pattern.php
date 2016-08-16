<?php
/*
*我们来思考这样一个场景:喱喱学车分为两种报名方式：直接报名&预约报名
*两种场景的收费模式不一样，直接报名收全款，预约报名只收20%的预付金，80的金额后期补充
*我们抽象一个类出来叫
*/
 abstract class Lesson{
    private $applyType; /*报名方式*/
    private $costStrategy;
    function __construct($applyType,CostStrategy $strategy){
        $this->applyType = $applyType;
        $this->costStrategy = $strategy;
    }
    /*
    *获取收费的方式
    params:none
    return:收费方式
    */
    function chargeType(){
      return $this->costStrategy->chargeType();
    }
    /**/
    function cost(){
      return $this->costStategy->cost();
    }
    
    function getApplyType(){
      return $this->applyType;
    }
 }
 
 abstract class CostStrategy{
   abstract function cost(Lesson $lesson);
   abstract function chargeType();
 }
 /*直接报名的方式类的写法如下*/
 class FixedCostStrategy extends CostStrategy{
    public $fixed_fee = 160;
    function cost(){return $this->fixed_fee;}
    function chargeType(){ return "Fixed rate Type!";}
 }
 
 /*预约报名的类的写法如下*/
 class TimesCostStrategy extends CostStrategy{
   function cost(Lesson $lesson){return ($lesson->getApplyType()*0.2);}
   function chargeType(){ return "Timed rate Type";}
 }
 
