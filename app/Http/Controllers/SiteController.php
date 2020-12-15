<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactsRepository;
use App\Models\Contact;
use Illuminate\Support\Arr;
use App\Http\Requests\ContactsRequest;
use Validator;


class SiteController extends Controller
{
	
    protected $c_rep;
	
    protected $template;
	
	protected $content = FALSE;
	    
    protected $title;
    
    protected $vars;

     public function __construct(ContactsRepository $c_rep) {
		
		$this->c_rep = $c_rep;
		
		$this->template = 'contacts.mycontacts';
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        		
		$this->title = 'My contacts';
        
        $contacts = $this->getContacts();
        $this->content = view('contacts.mycontacts_content')->with('contacts',$contacts)->render();
       
        
        return $this->renderOutput(); 
    }
	
	public function renderOutput() {
	
	$this->vars = Arr::add($this->vars,'title',$this->title);
	
	$this->vars = Arr::add($this->vars,'content',$this->content);
			
	return view($this->template)->with($this->vars);
	
	}
	
	public function getContacts($paginate = TRUE)
	
    {
        return $this->c_rep->get('*',$paginate);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = "Add a new contact";
					
		$this->content = view('contacts.mycontacts_create_content')->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactsRequest $request)
    {
	
        $result = $this->c_rep->addContact($request);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/main');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

	
	public function search(Request $request){
	
	$this->title = "Search contact";
	
	$q = $request->input('q');
	
    $contacts = Contact::where('name','LIKE','%'.$q.'%')
	->orWhere('number','LIKE','%'.$q.'%')
	->orWhere('second_number','LIKE','%'.$q.'%')
	->orWhere('email','LIKE','%'.$q.'%')
	->orWhere('second_email','LIKE','%'.$q.'%')
	->get();
	
    if(count($contacts) > 0) {
		$this->content = view('contacts.search')->with(['contacts' => $contacts, 'q' => $q])
		->withDetails($contacts)->withQuery ($q)->render();
		}
	else {
	
    $this->content = view( 'contacts.search_notfound' )->withQuery($q)->withMessage ( 'No Details found. Try to search again !' );
		}
	
     return $this->renderOutput();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
				
		$this->title = 'Update contacts'. $contact->title;
		
		
		$this->content = view('contacts.mycontacts_create_content')->with(['contact' => $contact])->render();
		
		return $this->renderOutput();
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        return $this->c_rep->updateContact($request, $contact);
		      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Contact $contact)
    {
        $result = $this->c_rep->deleteContact($contact);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/main');
    }
}
