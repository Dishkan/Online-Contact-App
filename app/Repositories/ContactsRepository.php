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
	
		$data = $request->except('_token');
		
        $validator = Validator::make($data, [
            'name' => 'required|max:255|unique:contacts,name,'.$contact['id'],
            'number' => array(
			'required:max:15',
			'regex: (998([\d]{9})$)',
			'unique:contacts,number,'.$contact['id'],
			),
			'second_number' => array(
			'nullable:max:15',
			'regex: (998([\d]{9})$)',
			'unique:contacts,number',
			'unique:contacts,second_number,'.$contact['id'],
			),
			'email' => 'required|email|unique:contacts,email,'.$contact['id'],
			'second_email' => array(
			'nullable',
			'email',
			'unique:contacts,email',
			'unique:contacts,second_email,'.$contact['id'],
			),
          ]);
	
        if ($validator->fails()) {
        return back()->with($data)->withErrors($validator);
      }
		
	    $contact->fill($data)->update();
	
	   return redirect('/main')->with($data);
	}

}


?>
