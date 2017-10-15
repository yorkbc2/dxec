<?php 

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Admin;

class AdminController {

	public function view_template ($pageName) {
		$page_urls = config('admin.page_urls');

		$total_pages = [];

		for($tp = 0 ; $tp < count($page_urls) ; $tp++) {
			if(isset($page_urls[$tp]['childs'])) {

				array_push($total_pages, [
					'url' => $page_urls[$tp]['url'],
					'view' => $page_urls[$tp]['view']
				]);

				for($ts = 0 ; $ts < count($page_urls[$tp]['childs']) ; $ts++) {
					array_push($total_pages, [
						'url' => $page_urls[$tp]['childs'][$ts]['url'],
						'view' => $page_urls[$tp]['childs'][$ts]['view']
					]);
				}
			

			}
			else {

				array_push($total_pages, [
					'url' => $page_urls[$tp]['url'],
					'view' => $page_urls[$tp]['view']
				]);

			}
		}

		for($routeCount  = 0 ; $routeCount < count($total_pages); $routeCount++) {

			$rItem = $total_pages[$routeCount];

			if($rItem['url'] == $pageName) {

				return view($rItem['view']);

			}

			else {
				continue;
			}

		}

		return view('admin.error.no-page', ['error_view_name' => $rItem['view']]);
	}

	public function view_index () {
		if(Admin::checkSession() == false) {
			return redirect("dx-login");
		}
		else {
			return view("admin.modules.main");
		}
	}

	public function view_login () {
		if(Admin::checkSession()) {
			return redirect('dx-admin');
		}
		else {
			return view("admin.login.index");
		}
	}

	public function post_login (Request $req) {
		$login = $req->admin_login;
		$password = $req->admin_password;

		$ifUsable = Admin::loginUser(["login" => $login, 
							"password" => $password]);
	
		if($ifUsable) {
			return redirect('dx-admin');
		}
		else {
			return view('admin.login.index', ["error_message" => true, "error_status" => 1]);
		}
	}

	public function logout () {
		session()->forget("admin_session");
		return redirect("/");
	}
}