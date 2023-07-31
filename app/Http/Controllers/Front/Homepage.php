<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\elaqeRequest;
use Mail;

        //  Models
use App\Models\Category;
use App\Models\Articles;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;



class Homepage extends Controller
{   
    public function __construct(){
        if(Config::find(1)->active==0){
            return redirect()->to('site.offline')->send();
        }

        view()->share('pages',$data['pages']=Page::orderBy('order','ASC')->get());
        view()->share('categories',$data['categories']=Category::InRandomOrder()->orderBy('id','DESC')->get());
    }
    public function index(){
        $data['articles']=Articles::orderBy('created_at','DESC')->paginate(2);
        return view ('front.homepage',$data);
    }

    public function single($slug){
        $article=Articles::where('slug',$slug)->first() ?? abort(403,'Bu adda blog yazısı mövcud deyil!');
        $data['article']=$article;
        $article->increment('hit');
        return view('front.single',$data);
    }

    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(403,'Bu kateqoriyada blog yazısı mövcud deyil!');
        $data['category']=$category;
        $data['articles']=Articles::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403,'Bu adda səhifə mövcud deyil!');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactpost(elaqeRequest $request){
      
     /*   Mail:send([],[], function($message) use ($request){
            $message->from('mahmudov_313@mail.ru','Blog sayt;');
            $message->to('mahmudov_313@mail.ru');
            $message->setBody('Mesaj gonderen: '.$request->name.' <br>
                                Movzu: '.$request->topic.' <br>
                                Mesaj: '.$request->message.' <br><br>
                                Tarix: '.now().'','text/html');
            $message->subject($request->name. 'elasenden gonderildi!');

        }); */
        $request->validate([
            'name' => 'required|max:35|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:3|max:20',
            'message' => 'required|max:1000|min:3',

        ]);
      
        $contact = new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesajınız uğurla göndərildi!');
    }
}
