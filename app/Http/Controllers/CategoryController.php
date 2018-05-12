<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

use App\Categories;
use Illuminate\Support\Facades\Hash;
class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Categories;
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view_categories')->with('flash_messsage_success','Category added successfully!');
        }

        
        return view('admin.categories.add_category');
    }


    public function editCategory(Request $request, $id  = null){
        if($request->isMethod('post')){
            $data = $request->all();

            Categories::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']
            ]);
            
        return redirect('/admin/view_categories')->with('flash_messsage_success','Category updated successfully!');
        }
       
        $categoryDetails = Categories::where(['id'=> $id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }     
    
    public function deleteCategory(Request $request, $id  = null){
        if(!empty($id)){
            Categories::where(['id'=> $id])->delete();
        return redirect()->back()->with('flash_messsage_success','Category deleteed successfully!');
        }
    }     

    public function viewCategories(){
        $categories = Categories::get();
        $categories = json_decode(json_encode($categories));
        return view('admin.categories.view_categories')->with(compact('categories'));
    }



}
