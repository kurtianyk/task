<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index(Request $request)
    {
    $contacts = Contact::where('user_id', $request->user()->id)->get();
    return view('/contacts',[
      'contacts' => $contacts,
    ]);

    }
    public function edit(Request $request, $id ){
      $contacts = Contact::where('id','=',$id->id)->where('user_id','=',$request->user()->id)->get();
      return view('/edit',[
        'contacts' => $contacts,
      ]);
    }

  public function store(Request $request)
  {
    // creat contact
    $this->validate($request, [
      'name' => 'required|max:255',
      'surname' => 'required|max:255',
      'phone_number' => 'required|numeric',
      'birth_day' => 'required|date_format:"Y-m-d"|before:tomorrow',
      'info' => 'required|max:255',
    ]);

    $request->user()->contacts()->create([

      'name' => $request->name,
      'surname' => $request->surname,
      'phone_number' => $request->phone_number,
      'birth_day' => $request->birth_day,
      'info' => $request->info,
    ]);

    return view('home')->with('message', 'Ваш контакт записаний. Можете ще когось додадти :)');
  }
  public function destroy(Request $request, Contact $contact)
  {
    $this->authorize('destroy', $contact);


    $contact->delete();
    return redirect('/contacts');

  }
  public function update( Request $request, Contact $contact)
  {
    $this->authorize('update', $contact);

    Contact::where('id',$request->input('id'))
    ->update(['name' => $request->input('name'),
     'surname' => $request->input('surname'),
     'phone_number' => $request->input('phone_number'),
     'birth_day' => $request->input('birth_day'),
     'info' => $request->input('info')]);



    $contacts = Contact::where('user_id', $request->user()->id)->get();
    return view('/contacts',[
      'contacts' => $contacts,
    ]);
  }
  public function b_day(Request $request, Contact $contact){
    if(Auth::guest()){
      return view('welcome');
    }
    else{
     $b_day = Contact::select()->get(); //->where('user_id', $request->user()->id)->whereBetween(DAYOFYEAR(birth_day, [DAYOFYEAR(NOW()), DAYOFYEAR(NOW()) +7]))->get();
      // SELECT * FROM `contacts` WHERE 'user_id'= $request->user()->id)->get() AND DAYOFYEAR(birth_day) BETWEEN DAYOFYEAR(NOW()) AND DAYOFYEAR(NOW()) +7
      //print_r($b_day);
      return view('/home', [
        'b_day' => $b_day,
      ]);
    }
  }

}
