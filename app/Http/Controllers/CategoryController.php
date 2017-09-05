<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Redirect;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
	 public function __construct()
    {
      $this->middleware('auth', ['except' => ['index', 'show']] );
    }
 
     public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

     public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request, ['name' => 'required|unique:categories|string|max:30',]);
        $slug = str_slug($request->name, "-");
        $category = Category::create(['name' => $request->name, 'slug'=>$slug, 'user_id'=>Auth::id()]);
        $category->save();
        alert()->success('Congrats!', 'You added a Category');
        return Redirect::route('category.index');
    }

    public function show(Category $category, $slug = '')
    {
        if ($category->slug !== $slug) {

            return Redirect::route('category.show', ['id' => $category->id,
                                                   'slug' => $category->slug],
                                                   301);
        }
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
      return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'name' => 'required|string|max:40|unique:categories,name,' .$id

            ]);
            $category = Category::findOrFail($id);
            $slug = str_slug($request->name, "-");
            $category->update(['name' => $request->name,'slug' => $slug]);
            alert()->success('Congrats!', 'You updated a Category');
            return Redirect::route('category.show', ['category' => $category, 'slug' =>$slug]);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        alert()->overlay('Attention!', 'You deleted a Category', 'error');
        return Redirect::route('category.index');
    }


}
