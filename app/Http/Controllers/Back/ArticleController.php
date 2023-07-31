<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Support\Str;
use File;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Articles::orderBy('created_at','DESC')->get();
        return view('back.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articles=new Articles;
        $articles->title=$request->title;
        $articles->category_id=$request->category;
        $articles->content=$request->content;
        $articles->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=str::Slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $articles->image='uploads/'.$imageName;
        }
        $articles->save();
        toastr()->success('Məqalə uğurla paylaşıldı!', 'Uğurlu!');

        return redirect()->route('yazilar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articles = Articles::findOrFail($id);
        $categories=Category::all();
        return view('back.articles.update',compact('categories','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $articles = Articles::findOrFail($id);
        return view('back.articles.update',compact('categories','articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articles=Articles::findOrFail($id);
        $articles->title=$request->title;
        $articles->category_id=$request->category;
        $articles->content=$request->content;
        $articles->slug=Str::slug($request->title);

        if($request->hasFile('image')){
            $imageName=str::Slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $articles->image='uploads/'.$imageName;
        }
        $articles->save();
        toastr()->success('Məqalə uğurla yeniləndi!', 'Uğurlu!');

        return redirect()->route('yazilar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        Articles::find($id)->delete();
        toastr()->success('Məqalə silinənlər qutusuna köçürüldü!', 'Uğurlu!');

        return redirect()->route('yazilar.index');
    }

    public function trashed(){
        
        $articles=Articles::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.articles.trashed',compact('articles'));
    }

    public function recover($id){
        Articles::onlyTrashed()->find($id)->restore();
        toastr()->success('Məqalə uğurla bərpa edildi!', 'Uğurlu!');

        return redirect()->back();
    }

    /*
    public function hardDelete($id){
        Articles::onlyTrashed()->find($id)->forceDelete();
        toastr()->success('Məqalə uğurla silindi!', 'Uğurlu!');

        return redirect()->back();
    }
    */
    public function hardDelete($id){
        $articles=Articles::onlyTrashed()->find($id);

        if(File::exists($articles->image)){
            File::delete($articles->image);
        }
        $articles->forceDelete();
        toastr()->success('Məqalə uğurla silindi!', 'Uğurlu!');

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
