<?php 


class AdminOrdersController{


public function actionIndex(){
AdminBase::checkAdmin();

	$orders = Order::getAllOrders();

	require_once(ROOT . '/views/admin_order/index.php');
	return true;

}


public function actionShow($id){
	AdminBase::checkAdmin();


	$order = Order::getOrderById($id);
	$products = Order::getOrderProducrs($id);

	require_once(ROOT . '/views/admin_order/view.php');
	return true;

}



public function actionUpdate($id){
AdminBase::checkAdmin();


	$order = Order::getOrderById($id);

	require_once(ROOT . '/views/admin_order/update.php');
	return true;

}


public function actionDelete(){
AdminBase::checkAdmin();

	$orders = Order::getAllOrders();

	require_once(ROOT . '/views/admin_order/index.php');
	return true;

}


	
}
