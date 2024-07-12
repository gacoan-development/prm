<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// LOGIN AND DASHBOARD
$routes->get('/', 'Login::index');
$routes->get('/index2', 'Login::index2');
$routes->post('login/login_action', 'Login::login_action');
$routes->get('dashboard', 'Home::index');
$routes->get('logout', 'Login::logout');

// RESTO
$routes->get('resto', 'Resto::resto_page');
$routes->get('resto/get_all', 'Resto::get_resto_list');
$routes->get('resto/form_resto', 'Resto::form_resto');
$routes->get('resto/get_master_area', 'Resto::get_master_area');
$routes->get('resto/get_master_revenue_type', 'Resto::get_master_revenue_type');
$routes->get('resto/get_master_pengelola', 'Resto::get_master_pengelola');
$routes->get('resto/get_duplicate_code', 'Resto::get_duplicate_code');
$routes->post('resto/simpan_form_resto', 'Resto::save_form_resto');
$routes->post('resto/get_data_by_id', 'Resto::get_data_by_id');
$routes->post('resto/update_form_resto', 'Resto::update_form_resto');

// GROUP RESTO
$routes->get('group_resto', 'GroupResto::group_resto_page');
$routes->get('group_resto/get_all', 'GroupResto::get_group_resto_list');
$routes->get('group_resto/form_group_resto', 'GroupResto::form_group_resto');
$routes->post('group_resto/get_data_by_id', 'GroupResto::get_data_by_id');
$routes->post('group_resto/simpan_form_group_resto', 'GroupResto::simpan_form_group_resto');
$routes->post('group_resto/update_form_group_resto', 'GroupResto::update_form_group_resto');

// TARIF PARKIR
$routes->get('tarif_parkir', 'Parkir::tarif_parkir_page');
$routes->post('tarif_parkir/get_all', 'Parkir::get_all');
$routes->get('tarif_parkir/form_parkir', 'Parkir::form_parkir');
$routes->post('tarif_parkir/get_data_by_id', 'Parkir::get_data_by_id');
$routes->post('tarif_parkir/get_fee', 'Parkir::get_fee');
$routes->post('tarif_parkir/get_master_order', 'Parkir::get_master_order');
$routes->post('tarif_parkir/get_master_revenue_type', 'Parkir::get_master_revenue_type');
$routes->post('tarif_parkir/get_fee_history', 'Parkir::get_fee_history');
$routes->post('tarif_parkir/save_form_tarif_parkir', 'Parkir::simpan_tarif_parkir');
$routes->post('tarif_parkir/update_form_tarif_parkir', 'Parkir::update_tarif_parkir');
$routes->post('tarif_parkir/check_fee_active', 'Parkir::check_fee_active');
$routes->post('tarif_parkir/upload_tarif', 'Parkir::upload_tarif');
$routes->post('tarif_parkir/update_uploaded_tarif', 'Parkir::update_uploaded_tarif');
$routes->post('tarif_parkir/get_all_resto', 'Parkir::get_all_resto');

// TIPE ORDER
$routes->get('order_type', 'Order::order_type_page');
$routes->get('order_type/get_all', 'Order::get_order_type_list');
$routes->get('order_type/form_order_type', 'Order::form_order_type');
$routes->post('order_type/get_data_by_id', 'Order::get_data_by_id');
$routes->post('order_type/simpan_form_order', 'Order::simpan_form_order');
$routes->post('order_type/update_form_order', 'Order::update_form_order');

// PENGELOLA
$routes->get('pengelola', 'Pengelola::pengelola_page');
$routes->get('pengelola/get_all', 'Pengelola::get_pengelola_list');
$routes->get('pengelola/form_pengelola', 'Pengelola::form_pengelola');
$routes->get('pengelola/get_resto_not_managed', 'Pengelola::get_resto_not_managed');
$routes->get('pengelola/get_resto_not_managed_detail', 'Pengelola::get_resto_not_managed_detail');
$routes->post('pengelola/get_data_by_id', 'Pengelola::get_data_by_id');
$routes->post('pengelola/get_resto_managed', 'Pengelola::get_resto_managed');
$routes->post('pengelola/save_form_pengelola', 'Pengelola::save_form_pengelola');
$routes->post('pengelola/update_form_pengelola', 'Pengelola::update_form_pengelola');
$routes->post('pengelola/upload_pengelola', 'Pengelola::upload_pengelola');
$routes->post('pengelola/update_uploaded_pengelola', 'Pengelola::update_uploaded_pengelola');

// BILLS
$routes->get('bills', 'Bills::bills_page');
$routes->get('bills/get_all', 'Bills::get_bills_list');

// PENAGIHAN (INVOICE)
$routes->get('invoice', 'Invoice::invoice_page');
$routes->post('invoice/get_all', 'Invoice::get_invoice_list');
$routes->get('invoice/form_invoice', 'Invoice::form_invoice');
$routes->post('invoice/get_all_resto', 'Invoice::get_all_resto');
$routes->get('invoice/get_resto_detail', 'Invoice::get_resto_detail');
$routes->post('invoice/check_fee_header', 'Invoice::check_fee_header');
$routes->post('invoice/check_invoice_number', 'Invoice::check_invoice_number');
$routes->post('invoice/save_invoice_header', 'Invoice::save_invoice_header');
$routes->get('invoice/resto_dashboard_invoice', 'Invoice::resto_dashboard_invoice');
$routes->post('invoice/load_existing_invoice', 'Invoice::load_existing_invoice');
$routes->post('invoice/get_format_tarif', 'Invoice::get_format_tarif');
$routes->post('invoice/print_flat', 'Invoice::print_flat');
$routes->post('invoice/print_persen', 'Invoice::print_persen');
$routes->post('invoice/outstanding_invoice_list', 'Invoice::outstanding_invoice_list');
$routes->post('invoice/update_invoice_header', 'Invoice::update_invoice_header');
$routes->post('invoice/update_invoice_detail', 'Invoice::update_invoice_detail');
$routes->post('invoice/upload_invoice', 'Invoice::upload_invoice');
$routes->post('invoice/update_uploaded_invoice', 'Invoice::update_uploaded_invoice');
$routes->post('invoice/update_selected_outstanding_invoice', 'Invoice::update_selected_outstanding_invoice');
$routes->post('invoice/get_all_outstanding', 'Invoice::get_all_outstanding');
$routes->post('invoice/get_data_by_id', 'Invoice::get_data_by_id');
$routes->post('invoice/get_managerial_area', 'Invoice::get_managerial_area');

// PAJAK
$routes->get('pajak', 'Pajak::pajak_page');
$routes->get('pajak/get_all', 'Pajak::get_pajak_list');
$routes->post('pajak/get_data_by_id', 'Pajak::get_data_by_id');
$routes->get('pajak/form_pajak', 'Pajak::form_pajak');
$routes->get('pajak/get_all_resto', 'Pajak::get_all_resto');
$routes->post('pajak/simpan_form_pajak', 'Pajak::save_form_pajak');
$routes->post('pajak/update_form_pajak', 'Pajak::update_form_pajak');
$routes->post('pajak/upload_pajak', 'Pajak::upload_pajak');
$routes->post('pajak/update_attachment', 'Pajak::update_attachment');
$routes->post('pajak/update_uploaded_pajak', 'Pajak::update_uploaded_pajak');

// FILE
$routes->get('file/viewFile/(:any)/(:any)', 'FileServe::viewFile/$1/$2');
$routes->get('file/downloadFile/(:any)/(:any)', 'FileServe::downloadFile/$1/$2');

// REPORT
$routes->get('report/receive_fee', 'Report::receive_fee_page');
$routes->post('report/receive_fee/get_all', 'Report::receive_fee_get_all');
$routes->post('report/receive_fee/export_to_excel', 'Report::receive_fee_export');

// USERS
$routes->get('users', 'User::users_page');
$routes->get('users/get_all', 'User::get_all');
$routes->get('users/form_users', 'User::form_users');
$routes->post('users/get_master_group_users', 'User::get_master_group_users');
