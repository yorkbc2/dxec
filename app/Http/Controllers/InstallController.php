<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use App\Admin;
use App\Setting;
use App\SecureKeys;

function stepOneHandler () {
	return view('install.steps.one');
}

function stepTwoHandler ($request) {
	$dbConfigInfo = [
		'host' => $request->db_host,
		'username' => $request->db_username,
		'name' => $request->db_name,
		'password' => $request->db_password
	];

	error_reporting(0);

	$mysqli_test_connect = mysqli_connect($dbConfigInfo['host'],
										$dbConfigInfo['username'],
										$dbConfigInfo['password'],
										$dbConfigInfo['name']);

	if(!$mysqli_test_connect) {
		return view("install.errors.database", ['stepId' => 1]);
	}
	else {
		config([
			'database.connections.mysql.host' => $dbConfigInfo['host'],
			'database.connections.mysql.database' => $dbConfigInfo['name'],
			'database.connections.mysql.username' => $dbConfigInfo['username'],
			'database.connections.mysql.password' => $dbConfigInfo['password']
		]);

		Artisan::call('migrate');
		Artisan::call('db:seed');

		return view('install.steps.two');
	}
}

function stepFinalHandler ($req) {

	$dc_ = [
		'admin_name' => $req->admin_name,
		'admin_login' => $req->admin_login,
		'admin_password' => $req->admin_password,
		'admin_email' => $req->admin_email,
		'store_title' => $req->store_title,
		'store_description' => $req->store_description
	];

	$sc_key = Admin::createSecureKey();
	$a_password = Admin::createHashFromString($dc_['admin_password']);

	$admin_id = Admin::insertGetId([
		'a_login' => $dc_['admin_login'],
		'first_name' => $dc_['admin_name']['first'],
		'last_name' => $dc_['admin_name']['second'],
		'status' => 1,
		'a_password' => $a_password,
		'sc_key' => $sc_key
	]);

	$special_key_id = SecureKeys::insertGetId(['sc_key' => $sc_key]);

	$setting_update = [['setting_value' => $dc_['store_title']], ['setting_value' => $dc_['store_description']], ['setting_value' => $dc_['admin_email']]];

	Setting::whereIn('setting_name', ['store_title', 'store_description', 'store_email'])->update($setting_update);

	dd($dc_);

}

function stepUndefined () {
	return print_r("Step Undefined");
}


class InstallController extends Controller
{
    public function get_install () {
    	return view('install.index');
    }

    public function get_install_step (Request $req, $stepId) {

    	switch($stepId) {
    		case 1:
    			return stepOneHandler($req);
    		case 2:
    			return stepTwoHandler($req);
    		case 3:
    			return stepFinalHandler($req);
    		default:
    			return stepUndefined();
    	}

    }
}
