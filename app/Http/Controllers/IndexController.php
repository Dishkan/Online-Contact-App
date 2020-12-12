<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class IndexController extends SiteController
{
   public function __construct() {
		
			$this->template = 'contacts.mainpage';
		
	}
	
	public function index() {
	
		
		$this->title = 'Online Contact App';
		
		return $this->renderOutput();
		
	}
}
