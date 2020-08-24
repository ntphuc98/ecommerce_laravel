<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesOption = $this->CategoriesOption(0);
        return view('admin.categories.create', ['categoriesOption' => $categoriesOption]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('admin.categories.edit', ['category' => $category])->with(['success' => __('admin.categories.create.success')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categoriesOption = $this->CategoriesOption($category->parent_id);
        return view('admin.categories.edit', ['category' => $category, 'categoriesOption' => $categoriesOption]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('admin.categories.edit', ['category' => $category])->with(['success' => __('admin.categories.edit.success')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id = $request->id;
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with(['success' => __('admin.categories.delete.success')]);
    }

    // private

    private function CategoriesOption($parentId){
        $rootCategories = Category::root()->get();
        $text = '-';
        $html = $this->buildCategoriesOption($rootCategories, $parentId, $text);
        return $html;
    }

    private function buildCategoriesOption($categories, $parentId, $text){
        $html = '';
        foreach ($categories as $category) {
            if($parentId == $category->id)
                $html .= '<option selected="selected" value="'.$category->id.'">' . $text . ' ' .$category->name . '</option>';
            else
                $html .= '<option value="'.$category->id.'">' . $text . ' ' .$category->name . '</option>';
            if($category->children != null){
                $html .= $this->buildCategoriesOption($category->children, $parentId, $text . '-');
            }
        }
        return $html;
    }
}
