<?php
    Route::get('/', 'MainController', 'index');
    Route::get('/login', 'AuthController', 'login');
    Route::get('/exit', 'AuthController', 'exit');
    Route::get('/home', 'MainController', 'home');
    

    Route::get('/table/product-category', 'DBController', 'index');
    Route::get('/table/customers', 'DBController', 'index');
    Route::get('/table/pawnshop-delivery', 'DBController', 'index');
    Route::get('/table/prices', 'DBController', 'index');
    
    Route::get('/table/product-category/add', 'DBController', 'fillFormAdd');
    Route::get('/table/customers/add', 'DBController', 'fillFormAdd');
    Route::get('/table/pawnshop-delivery/add', 'DBController', 'fillFormAdd');
    Route::get('/table/prices/add', 'DBController', 'fillFormAdd');
    Route::get('/table/product-category/add/submit', 'DBController', 'add');
    Route::get('/table/customers/add/submit', 'DBController', 'add');
    Route::get('/table/pawnshop-delivery/add/submit', 'DBController', 'add');
    Route::get('/table/prices/add/submit', 'DBController', 'add');

    Route::get('/table/product-category/delete', 'DBController', 'fillFormDelete');
    Route::get('/table/customers/delete', 'DBController', 'fillFormDelete');
    Route::get('/table/pawnshop-delivery/delete', 'DBController', 'fillFormDelete');
    Route::get('/table/prices/delete', 'DBController', 'fillFormDelete');
    Route::get('/table/product-category/delete/submit', 'DBController', 'delete');
    Route::get('/table/customers/delete/submit', 'DBController', 'delete');
    Route::get('/table/pawnshop-delivery/delete/submit', 'DBController', 'delete');
    Route::get('/table/prices/delete/submit', 'DBController', 'delete');

    Route::get('/table/product-category/update', 'DBController', 'fillFormUpdate');
    Route::get('/table/customers/update', 'DBController', 'fillFormUpdate');
    Route::get('/table/pawnshop-delivery/update', 'DBController', 'fillFormUpdate');
    Route::get('/table/prices/update', 'DBController', 'fillFormUpdate');
    Route::get('/table/product-category/update/submit', 'DBController', 'update');
    Route::get('/table/customers/update/submit', 'DBController', 'update');
    Route::get('/table/pawnshop-delivery/update/submit', 'DBController', 'update');
    Route::get('/table/prices/update/submit', 'DBController', 'update');

    Route::get('/query/1', 'DBController', 'formFirstQuery');
    Route::get('/query/1/submit', 'DBController', 'firstQuery');

    Route::get('/query/2', 'DBController', 'formSecondQuery');
    Route::get('/query/2/submit', 'DBController', 'secondQuery');

    Route::get('/register-delivery', 'DBController', 'fillFormRegisterDelivery');
    Route::get('/register-delivery/submit', 'DBController', 'registerDelivery');

    Route::get('/add-user', 'AuthController', 'fillFormAddUser');
    Route::get('/add-user/submit', 'AuthController', 'addUser');
    Route::get('/delete-user', 'AuthController', 'fillFormDeleteUser');
    Route::get('/delete-user/submit', 'AuthController', 'deleteUser');
    Route::get('/select-users', 'AuthController', 'selectUsers');
    Route::get('/user', 'AuthController', 'user');
    Route::get('/change-passwd', 'AuthController', 'formChangePassword');
    Route::get('/change-passwd/submit', 'AuthController', 'сhangePassword');