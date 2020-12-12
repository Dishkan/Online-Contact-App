<?php
namespace App\Repositories;

use App\Models\Contact;
use Validator;

class ContactsRepository extends Repository {
   
   public function __construct(Contact $contact) {
   
      $this->model = $contact;
	  
   }
   
   	public function addContact($request) {
	
		$data = $request->all();
		
		$contact = $this->model->create([
            'name' => $data['name'],
            'number' => $data['number'],
            'second_number' => $data['second_number'],
            'email' => $data['email'],
            'second_email' => $data['second_email'],
        ]);
				
	}
	
	public function deleteContact($contact) {
	
		return $contact->delete();
		
	}
	
	public function updateContact($request, $contact) {
		
		$data = $request->all();
		
		$contact->fill($data)->update();
				
	}
	
	

}


?>