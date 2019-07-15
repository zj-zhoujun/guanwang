<?php
namespace app\index\controller;
use app\index\model\Sort as SortModel;

class Index extends Base{
    public function index(){
        return $this->fetch();
    }
}
