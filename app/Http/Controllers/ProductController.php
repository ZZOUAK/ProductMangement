<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::latest()->get();
        return view('products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        request()->validate([
            'name' => 'required|string|unique:products,name',
            'description' => 'required|string',
            'price' =>'required|numeric',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Category' =>'required|string|exists:categories,name',

        ]);


        $category=Category::where('name',strip_tags(request('category')))->get();
        $categoryId=$category[0]->id;

        $product->category_id=$categoryId;
        $product->name=strip_tags(request('name'));
        $product->description=strip_tags(request('description'));
        $product->price=strip_tags(request('price'));
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp

            $name = Str::slug($request->input('name').'_'.time());
            // Define folder path
            $folder = 'public/storage/images';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . '/'.$name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->image = $filePath;
        }



        $product->save();

        $request->session()->flash('status', 'Product saved !  ');

            return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.create',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
