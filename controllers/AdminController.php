<?php

class AdminController{


public function actionIndex(){
	AdminBase::checkAdmin();
require_once(ROOT . '/views/admin/index.php');
return true;
}


}