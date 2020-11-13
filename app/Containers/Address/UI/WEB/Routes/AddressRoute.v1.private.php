<?php

$router->get('AdmistrativeUnit','Controller@getAdmistrativeUnit')->name('AdmistrativeUnit');

$router->get('AddressComponent','Controller@getAddressComponent')->name('AddressComponent');

$router->get('UserInput','Controller@getUserInput')->name('UserInput');

$router->post('addNewAdmistrativeUnit','Controller@addNewAdmistrativeUnit')->name('addNewAdmistrativeUnit');

$router->post('addNewAddressComponent','Controller@addNewAddressComponent')->name('addNewAddressComponent');

$router->get('removeAddressComponent/{uuid}','Controller@removeAddressComponent')->name('removeAddressComponent');