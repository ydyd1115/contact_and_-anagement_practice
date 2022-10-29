<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Pagination\MyPaginator;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function contact(Request $request)
    {
        $contact = $request->all();
        return view('contact',compact('contact'));
    }

    public function confirm(ContactRequest $request)
    {
        // $contact = $request->all();
        $contact = $request->all();
        return view('confirm',compact('contact'));
    }

    public function add(Request $request){
        $contact = $request->all();
        unset($contact['_token']);
        
        if($request->input('back') == 'back'){
        return redirect('/contact')->withInput();
        }

        $contact = array_merge($contact,
        array('fullname'=>$contact['family_name']." ".$contact['first_name']));
        unset($contact['family_name']);
        unset($contact['first_name']);

        Contact::create($contact);

        return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }


    public function admin(Request $request)
    {
        $items = Contact::Paginate(10);
        $param = ['items'=> $items];
        
        return view('admin',$param);
    }
    
    public function search(Request $request)
    {          
        $fullname = $request->fullname;
        $gender = $request->gender;
        $keyword =$request->keyword;
        $from = $request->from;
        $until =$request->until;
        $datas =[
            'fullname'=>$fullname,
            'gender'=>$gender,
            'keyword'=>$keyword,
            'from'=>$from,
            'until'=>$until];

        $items = Contact::ContactSearch($datas);
        
        $param = ['items'=> $items];
        return view('admin',$param);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function del_multi(Request $request){
        $delete = array($request->input('del_multi'));    
        dd($delete);  
        Contact::find($delete)->delete();
        return redirect('/admin');
    }
    }


