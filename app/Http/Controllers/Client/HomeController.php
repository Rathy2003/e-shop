<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private int $PER_PAGE = 12;
    // Home Page
    public function index()
    {
        $trendingProducts = Product::with(["category:id,name"])->inRandomOrder()->take($this->PER_PAGE)->get();
        return view('client.index', compact('trendingProducts'));
    }

    // View Product Page
    public function view_product($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('client.detail',compact('product'));
    }

    // Shop Page
    public function shop(Request $request,$name="")
    {
        $search_query = $request->query('q');

        $categories = Category::all();
        $category = strtolower($name) !== "shop" || trim($name) != "" ?  Category::where('name',$name)->first() : null;
        // is request if not equal shop and can't find category from database return not found view.
        if(!$category && $request->routeIs('client.category')){
            return view('client.not-found');
        }
        $activeCategory = $name ?? null;
        if($search_query){
            $products = Product::where('name','like','%'.$search_query.'%')->paginate($this->PER_PAGE)->appends(['q'=>$search_query]);
            return view('client.shop',compact('categories','products','activeCategory'));
        }
        $query =  Product::with('category:id,name');
        if($category){
            $products = $query
                ->where('category_id',$category->id)
                ->paginate($this->PER_PAGE)->onEachSide(1);
        }else {
            $products = $query->paginate($this->PER_PAGE)->onEachSide(1);
        }
        return view('client.shop',compact('categories','products','activeCategory'));
    }

    public function order()
    {
        return view('client.order');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function cart_items()
    {
        return view('client.cart_item');
    }

    public function about()
    {
        return view('client.about');
    }

    public function contact()
    {
        return view('client.contact');
    }

}
