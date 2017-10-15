<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


function stepOneHandler () {
	return view('install.steps.one');
}

function stepTwoHandler () {
	return print_r("Step Two");
}

function stepFinalHandler () {

	return print_r("Step Final");

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
    			return stepOneHandler();
    		case 2:
    			return stepTwoHandler();
    		case 3:
    			return stepFinalHandler();
    		default:
    			return stepUndefined();
    	}

    }
}
