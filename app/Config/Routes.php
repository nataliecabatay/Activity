<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'SampleCrud::index');
$routes->post('add-product', 'SampleCrud::OnPost');
$routes->post('update-product', 'SampleCrud::OnUpdate');
$routes->get('delete-product/(:num)', 'SampleCrud::OnDelete/$1');

$routes->post('upload-song', 'SampleCrud::OnPostUploadMusic');

$routes->get('playlist/(:num)','SampleCrud::OnGetPlayList/$1');
$routes->post('create-playlist','SampleCrud::OnPostCreatePlaylist');
$routes->get('delete-song/(:num)','SampleCrud::OnGetDeletePlayList/$1');
$routes->post('delete-playlist','SampleCrud::OnDeletePlayL');