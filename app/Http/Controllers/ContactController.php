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

  public function store(Request $request)
  {
    // creat contact
    $this->validate($request, [
      'name' => 'required|max:255',
      'surname' => 'required|max:255',
      'phone_number' => 'required|numeric|unique:contacts,phone_number,'. Auth::user()->id,
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
    return redirect('/contact');

  }

}
