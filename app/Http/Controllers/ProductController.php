<?php

namespace App\Http\Controllers;

use App\Traits\UploadTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::latest()->get();
        return view('products.index',[
            'products'=>$products
            ]);
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
            'price' => 'required|numeric',
            'image' => 'required',
            'Category' =>'required|string|exists:categories,name',

        ]);


        $category=Category::where('name',strip_tags(request('Category')))->get();

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
            $folder = 'images';
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

        return view('products.edit',['product'=>$product,
        'category'=>Category::find($product->category_id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {


        $validatedData=request()->validate([

            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required',
            'Category' =>'required|string|exists:categories,name',

        ]);



        $category=Category::where('name',strip_tags(request('Category')))->get();

        $categoryId=$category[0]->id;

        $product->category_id=$categoryId;

        $product->description=strip_tags(request('description'));
        $product->price=strip_tags(request('price'));

        if ($request->hasFile('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp

            $name = Str::slug($request->input('name').'_'.time());
            // Define folder path
            $folder = 'images';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . '/'.$name. '.' . $image->getClientOriginalExtension();
            // Upload image

            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $product->image = $filePath;

        }


        $product->save();

        $request->session()->flash('status', 'Product Updated !  ');

            return redirect(route('home'));

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
        return redirect(route('home'));
    }
}
