<?php

return array(
    
    'product/([0-9]+)' => 'product/view/$1', 
    'product/compare/([0-9]+)' => 'product/compare/$1',
    'compare/delete/([0-9]+)' => 'site/delete/$1',
    'compare' => 'site/compare',
    'search'  => 'search/index/$1',
     'search/page-([0-9]+)'  => 'search/index/$1',
    'catalog' => 'catalog/index', 
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',  
    'user/register' =>'user/register',
    'user/login' =>'user/login',
    'user/logout' =>'user/logout',
    'contact' =>'site/contact',
    'cart/add/([0-9]+)' =>'cart/add/$1',
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' =>'cart/delete/$1',
    'cart' =>'cart/index',
    'cabinet/history/orders/show/([0-9]+)'=>'cabinet/show/$1',
     'cabinet/edit' =>'cabinet/edit',
     'cabinet/history' =>'cabinet/history',
     'cabinet' =>'cabinet/index',
    
      '' => 'site/index',  
    'admin/products/page-([0-9]+)' => 'adminProducts/index/$1',
    'admin/products/delete/([0-9]+)'=>'adminProducts/delete/$1',
    'admin/products/create'=>'adminProducts/create',
    'admin/products/update/([0-9]+)'=>'adminProducts/update/$1',
    'admin/products'=> 'adminProducts/index',


  'admin/orders/delete/([0-9]+)'=>'adminOrders/delete/$1',
  'admin/orders/update/([0-9]+)'=>'adminOrders/update/$1',
  'admin/orders/show/([0-9]+)'=>'adminOrders/show/$1',
  'admin/orders'=> 'adminOrders/index',

  'admin/categories/delete/([0-9]+)'=>'adminCategory/delete/$1',
  'admin/categories/update/([0-9]+)'=>'adminCategory/update/$1',
  'admin/categories/create'=>'adminCategory/create',
  'admin/categories'=> 'adminCategory/index',
  'admin' => 'admin/index',
   
);
