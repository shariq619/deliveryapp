<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminModel;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $products = Product::all();
        // Sharing is caring
        View::share('total', $products->count());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['products'] = Product::all();
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'categories' => 'required|array',
        ]);
        $data['slug'] = Str::slug($data['name'], "-");

        $product = Product::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => $data['description'],
            'price' => $data['price'],
        ]);


        $product->categories()->attach($data['categories']);

        return redirect()->route('products.index')->with('message', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $category = Product::find($id);
        return view('admin.products.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['products'] = Product::find($id);
        $data['categories'] = Category::all();
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'categories' => 'required|array',
        ]);
        $data['slug'] = Str::slug($data['name'], "-");

        $product = Product::find($id);

        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->description = $data['description'];
        $product->price = $data['price'];

        $product->update();

        $product->categories()->sync($data['categories']);

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product Deleted Successfully');
    }
}
