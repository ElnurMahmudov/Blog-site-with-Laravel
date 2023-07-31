<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }

    public function create(Request $request){
        $isExist = Category::whereSlug(Str::slug($request->category))->first();
        if($isExist){
            toastr()->error('Bu kateqoriya artıq mövcuddur!', 'Uğursuz!');
        return redirect()->back();
        }
        $category = new Category;
        $category->name = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        toastr()->success('Kateqoriya uğurla əlavə edildi!', 'Uğurlu!');
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $category=Category::all();
        $category=Category::findOrFail($id);

        return view('back.categories.update',compact('category'));
    }

    public function update(Request $request, string $id)
    {   
        $this->validate($request, [
        'title'=> 'required',
        'slug'=> 'required'
    ]);

        $isSlug = Category::whereSlug(Str::slug($request->slug))->first();
        if($isSlug){
            toastr()->error('Bu kateqoriya artıq mövcuddur!', 'Uğursuz!');
        return redirect()->back();
        }
        $category = Category::all();
        $category = Category::findOrFail($id);


        $category->name = $request->title;
        $category->slug = $request->slug;
       
        $category->update();

        toastr()->success('Kateqoriya uğurla əlavə yenilendi!', 'Uğurlu!');
        return redirect()->route('category.index');
    }

    public function delete($id){
        $category = Category::all();
        $category = Category::findOrFail($id);
        $categorycount = $category->articleCount();
        if($categorycount > 0){
            toastr()->error('Bu kateqoriyaya aid məqalə olduğu üçün kateqoriya silinə bilməz!', 'Qadağandır!');
        return redirect()->back();
        }       
        $category->delete();
        toastr()->success('Kateqoriya uğurla silindi!', 'Uğurlu!');
        return redirect()->back();

    }
}
