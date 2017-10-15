<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{

	public static function loginUser ($info = []) {
		$admin_ = DB::table("admins")->where("a_login", "=", $info["login"])->first();

		if($admin_) {
			if(isset($admin_->a_id) AND isset($admin_->a_password)) {
				if(Hash::check($info["password"] ,$admin_->a_password)) {
					session()->put("admin_session", $admin_);
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}

	}

	public static function createHashFromString($string = '') {
		return Hash::make($string);
	}

	public static function createSecureKey () {
		$secureKey = md5(substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'), 0, rand(10,15)));

		return $secureKey;
	}

    public static function checkSession() {
    	if(session()->get("admin_session")) {
    		$adminSession = session()->get("admin_session");
    		$secureKey = DB::table("secure_keys")->where("sc_key", "=", $adminSession->sc_key)->first();

    		if($secureKey) {
    			return true;
    		}
    		else {
    			return false;
    		}
    	}	
    	else {
    		return false;
    	}
    }
}
