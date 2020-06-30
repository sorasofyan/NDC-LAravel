<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;
use Session;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsEditRequest;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $news = News::all();
        //  $news = News::paginate(4);
        // $news = News::simplePaginate(4);
       
        // $news = News::where("title","like","%$q%")->get();

        // search & paginate 
        // $q=$request->get("q")??"";
        // $news = News::where("title","like","%{$q}%")
        // ->paginate(5)
        // ->appends(["q"=>$q]);
        
        // search & paginate  advance
        $q=$request->get("q")??"";
        $published=$request->get("published");
        $category=$request->get("category");

        $news=News::whereRaw('true');
        if($q){
            $news->where("title","like","%$q%");
        }
        if($published!=null){
            $news->where("published",$published);
        }
        if($category){
            $news->where("category_id",$category);
        }

        $news=$news->paginate(5) ->appends(["q"=>$q,
                                            "published"=>$published,
                                            "category"=>$category,
        ]);
        $categories= Category::orderBy("title")->get();

        return view("news.index",compact(["news","categories"]));
    }


   /* public function paging()
    {
         $news = News::paginate(4);
        // $news = News::simplePaginate(4);
        return view("news.index")->with("news",$news);
    }*/

/*
    public function search()
    {
        $q=$request->get("q")??"";
        $news = News::where("title","like","%$q%")->get();
        return view("news.index")->with("news",$news);
    }*/
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("news.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if(!$request->published ){
            $request['published']=0;
        }

         //حفظ الصورة
        //basename بتشيل المسارات وتبقي فقط على اسم الملف
        $imageName = basename($request->imageFile->store("public"));
        $request['image'] = $imageName;
        News::create($request->all());

        session()->flash("msg", "s: News Created Successfully");
        return redirect(route("news.index"));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);

        if(!$new){
            session()->flash("msg", "e: News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("news.show")->withNew($new)->withCategories($categories);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);
        if(!$new){
            session()->flash("msg", "e: News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("news.edit")->withNew($new)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        if(!$request->published ){
            $request['published']=0;
        }
        if($request->imageFile){
            $imageName = basename($request->imageFile->store("public"));
            $request['image'] = $imageName;
        }

        $new = News::find($id);
        $new->update($request->all());

        session()->flash("msg", "i: News Updated Successfully");
        return redirect(route("news.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        session()->flash("msg", "w: News Deleted Successfully");
        return redirect(route("news.index"));
    }
}
