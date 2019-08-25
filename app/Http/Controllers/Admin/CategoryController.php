<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Field;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function categorySections($category_id)
    {
        $sections = Category::findOrFail($category_id)
            ->sections()
            ->where('parent_id', $category_id)
            ->with(['fields'])
            ->get();

        return view('admin.pages.categories.category-sections', compact('sections'));
    }

    public function sectionProducts($section_id)
    {
        $section = Category::findOrFail($section_id);
        $products = $section->products;

//        $products= DB::table('products')->where('category_id', $section_id)->get();

        return view('admin.pages.categories.section-products', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        $fields = Field::all();

        return view('admin.pages.categories.new', compact(['categories', 'fields']));
    }

    public function store(Request $request)
    {
        $rules =  [
            'title_am' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
        ];  

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,bmp,png,gif';
	    }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return back()->withErrors($validator->errors());

        $category = Category::add($request);

        $fields_ids = $request->input('additional_fields');
        $category->fields()->sync($fields_ids);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $all_categories = Category::with(['parent'])->get();
        $current_category = $all_categories->find($id);
        $categories = $all_categories->where('parent_id', null);

        return view('admin.pages.categories.edit', compact(['categories', 'current_category']));
    }

    public function update(Request $request, $id)
    {
        $category=Category::findOrFail($id);

        $rules = [
            'title_am'=>'required',
            'title_ru'=>'required',
            'title_en'=>'required',
        ];

        $formInput = $request->all();

        if ($request->hasFile('image'))
            $rules['image'] = 'required|image|mimes:jpeg,jpg,bmp,png,gif';

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return back()->withErrors($validator->errors());

        if($request->hasFile('image'))
            $formInput['image'] = $category->uploadimage($request->file('image'));

        $category->update($formInput);

        return redirect()->route('categories.index')->with('success', 'Category updated');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->removeImage();
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted');
    }

//    ------------------------------------------------------------------------------------------------------------------
//    Вместо этого аякс метода можно также получить нужные дополнительные поля блэйдовым форичем без джаваскрипта
    public function ajaxCategories(Request $request)
    {
        if($request->ajax()) {
            $category = Category::find($request->category);
            $categoryFields = $category->fields;
            return response()->json(['categoryFields' => $categoryFields]);
        }
    }
}
