<?php

namespace App\Http\Controllers;

class PagesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('pages.index');
	}
	
	public function terms()
	{
		return view('pages.terms-of-service');
	}
	public function privacy()
	{
		return view('pages.privacy');
	}
}
