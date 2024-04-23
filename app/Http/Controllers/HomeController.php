<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAddCategory(){
        return view('admin.category.add');
    }
    public function getManageCategory(){
        $jhola =[
            'categories' => Category::all(),
            // 'onlyshowcategories' => Category::where('status', 'active')->get(),
            // 'users' => User::all()
        ];
        // dd($jhola['onlyshowcategories']);
        return view('admin.category.manage', $jhola);
    }

    public function getAddProduct()
    {
        return view('admin.product.add');
    }

    public function postAddProduct()
    {
        return 'Hello Im here';
    }
    public function postAddCategory(Request $request){
        // photo lai photo veriable ma store gare ko
        $photo = $request->file('photo');
       
            // photo ko extension name taneko
            $extension = $photo->getClientOriginalExtension();

            //unique time ra photo extension milayara photo ko nam banaya ko
            $photoname = md5(time()).'.'.$extension;

            // photo lai tehi name ma server ma move gare ko
            $photo->move('uploads/category/', $photoname);
           
            
        $category = New Category;
        $category->name = $request->name;
        $category->detail = $request->detail;
        $category->status = $request->status;
    
            $category->photo = $photoname;
        
        $category->save();
        return redirect()->back()->with('status', 'Category added successfully');
    }
}
