<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use File;

class PageController extends Controller
{
    public function index(){
        $pages = Page::all();
        return view('back.pages.index',compact('pages'));
    }

    public function orders(Request $request){
        foreach($request->get('get') as $key => $order){
        Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function create(){
        return view('back.pages.create');
    }

    public function post(Request $request){
        $last=Page::orderBy('order','desc')->first();
        $pages=new Page;
        $pages->title=$request->title;
        $pages->content=$request->content;
        $pages->slug=Str::slug($request->title);
        $pages->order=$last->order+1;

        if($request->hasFile('image')){
            $imageName=str::Slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $pages->image='uploads/'.$imageName;
        }
        $pages->save();
        toastr()->success('Səhifə uğurla əlavə edildi!', 'Uğurlu!');

        return redirect()->route('pages.index');

    }

    public function edit(string $id)
    {
        $pages = page::findOrFail($id);
        return view('back.pages.update',compact('pages'));
    }


    public function update(Request $request, string $id){
        $pages=page::findOrFail($id);
        $pages->title=$request->title;
        $pages->content=$request->content;
        $pages->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=str::Slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $pages->image='uploads/'.$imageName;
        }
        $pages->save();
        toastr()->success('Səhifə uğurla yeniləndi!', 'Uğurlu!');

        return redirect()->route('pages.index');
    }

    public function delete($id){
        $pages=Page::find($id);

        if(File::exists($pages->image)){
            File::delete($pages->image);
        }
        $pages->delete();
        toastr()->success('Məqalə uğurla silindi!', 'Uğurlu!');

        return redirect()->back();
    }
}
