<?php

namespace App\Http\Controllers\admin;


use App\Models\Contact;
use App\Mail\ContactMail;
use App\Models\Newsletter;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{

    // View Email Form 
    public function sendMail($id)
    {
        $contact = Contact::find($id);
        return view('dashboard.contact.send-mail', ['email' => $contact->email, 'id' => $contact->id]);
    }



    // Send Email
    public function send(Request $request)
    {
        // dd($request->all());
        
        $emailcontent = $request->emailbody;
        Mail::to($request->email)->send(new ContactMail($emailcontent));

        $contact = Contact::find($request->id);
        $contact-> replied = 1;
        $contact-> save();
        return redirect('/admin/messages');
    }

    // View Email Form 
    public function sendNewsletterForm()
    {
        $subscribers = Newsletter::all();
        if($subscribers->count() <= 5) {
            return view('dashboard.newsletter.send-newsletter');
        }else {

            return redirect('/newsleeters')->with('message', 'Unfortunately now sending emails to more than 5 people at once is not supported!');
        }
    }

    // Send Email
    public function sendNewsletter(Request $request)
    {
        // dd($request->all());
        $emailcontent = $request->emailbody;

        $subscribers = Newsletter::all();

            foreach($subscribers as $subscriber){
                Mail::to($subscriber)->send(new NewsletterMail($emailcontent));
            }

            return redirect('/newsleeters');
      


    }
    
}
