<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $showCategory = Category::all();
        return view('dash-board.categories.showallCategories' , compact('showCategory'));
    }
    public function create()
    {
        $categories = Category::where('parent_id',0)->get();
        // $categories = Category::where('parent_id' , '==',0)->get();
        // $supcategories = Category::where('parent_id' , '!=',0)->get();
        // $categories = DB::table('categories')->get();
        // $categories = Category::all();
        return view('dash-board.categories.createCategories' , ["categories" => $categories]);
    }
    public function supCate(Request $request){
        $parent_id = $request->cat_id;
        // dd($parent_id);
        $supcategories = Category::where('id' , $parent_id)
                                ->with('supcategories')
                                ->get();
        return response()->json(['supcategories' => $supcategories]);
    }
    public function store(Request $request)
    {
        // $category = new Category();
        $request->validate([
            'category_name'  => 'required',
            'href'           => 'required|unique:categories,href',
            'title'          => 'required',
            'visible_status' => 'required'
        ]);
        // $isChecked = $request->has('checkbox_n');
        // if($isChecked === true){
        //     dd(true);
        // }else{
        //     dd(false);
        // }
        $mydataCreated = Category:: create([
            'category_name'  => $request->input('category_name'),
            'href'           => $request->input('href'),
            'title'          => $request->input('title'),
            'visible_status' => $request->visible_status ? '1': '0',
            'parent_id'      => $request->category ? $request->category : 0 // or Null
        ]);
        // if($mydataCreated->save()){
        //     return redirect()->route('categories.index')->with(['success' => 'Category added succes']);
        // }
        return redirect()->route('categories.main')
            ->with('success' , 'Successfuly added data');
    }
    public function edit(Category $category , $id)
    {
        $find_id_category = new Category();
        $category = $find_id_category->findOrFail($id);
        $categories = Category::where('parent_id',0)->get();
        return view('dash-board.categories.editCategories' , compact('category' , 'categories'));
    }
    public function update(Request $request, Category $category , $id)
    {
        $category = Category::find($id);
        $request->validate([
            'category_name'  => 'required',
            'href'           => 'required|unique:categories,href',
            'title'          => 'required',
            'visible_status' => 'required'
        ]);
        $category->category_name = $request->category_name;
        $category->href = $request->href;
        $category->title = $request->title;
        $category->visible_status = $request->visible_status;
        $category->update();

        return redirect()->route('categories.main')
            ->with('success' , 'Successfuly updated data');
    }
    public function destroy(Category $category , $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('categories.main')
            -> with('success' , 'Successfuly deleted data');
    }
}
