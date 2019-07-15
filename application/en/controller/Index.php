<?php
namespace app\en\controller;
use app\en\model\Sort as SortModel;

class Index extends Base{
    public function index(){
        return $this->fetch();
    }
}
