<?php

$router->get('AdmistrativeUnit','Controller@getAdmistrativeUnit')->name('AdmistrativeUnit');

$router->get('AddressComponent','Controller@getAddressComponent')->name('AddressComponent');
$router->post('Add','Controller@addNewAdmistrativeUnit')->name('addNewAdmistrativeUnit');
