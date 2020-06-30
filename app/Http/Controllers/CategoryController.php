<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
// use App\News;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //$categories = Category::all();
         // $categories = Category::all();
        //  $categories = Category::paginate(4);
        // $categories = NewCategorys::simplePaginate(4);
        $q=$request->get("q")??"";
        // $news = Category::where("title","like","%$q%")->get();
        $categories = Category::where("title","like","%{$q}%")
        ->paginate(2)
        ->appends(["q"=>$q]);
        return view("category.index")->with("categories",$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if(!$request->show ){
            $request['show']=0;
        }
        Category::create($request->all());

        session()->flash("msg", "s: Category Created Successfully");
        return redirect(route("categories.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            session()->flash("msg", "e: Category was not found");
            return redirect(route("categories.index"));
        }
       
        return view("category.show")->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category){
            session()->flash("msg", "e: Category was not found");
            return redirect(route("categories.index"));
        }
        return view("category.edit")->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if(!$request->show ){
            $request['show']=0;
        }
        $category=Category::find($id);
        $category->update($request->all());

        session()->flash("msg", "i: Category Updated Successfully");
        return redirect(route("categories.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {// مشان لما يحزف تصنيف ويكون اله اولاد ما يحزفه اما ازا ما اله اولاد يحزفه عادي
        $category= Category::find($id);
            if($category->news->count()>0){
                session()->flash("msg", "w: can't delete this category becouse has news");
                    return redirect(route("categories.index"));
            }
        Category::destroy($id);
        session()->flash("msg", "w: Category Deleted Successfully");
        return redirect(route("categories.index"));
    }
}
