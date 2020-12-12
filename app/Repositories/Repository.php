<?php
namespace App\Repositories;

abstract class Repository {
	
	protected $model = FALSE;
	
	
	public function get($select = '*', $pagination = FALSE) {
		
		$builder = $this->model->select($select);
		
		if($pagination) {
			return $builder->paginate(15);
		}	
		
		return $builder->get();
	}
	
}




?>