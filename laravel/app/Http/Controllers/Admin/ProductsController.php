<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);
        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all()->toArray();
        return view('admin/products/create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateProductRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductRequest $request)
    {
        $product = $request->all();
        unset($product['product_images']);
        unset($product['thumbnail']);
        unset($product['_token']);

        if (!empty($request->file('thumbnail') )){
            $imageService = app()->make(\App\Services\Contract\ImageServiceInterface::class);
            $filePath = $imageService->upload($request->file('thumbnail'));
            $product['thumbnail'] = $filePath;
        }
        $product = Product::create($product);

        if (!empty($request->file('product_images'))){
            foreach ($request->file('product_images') as $image){
                $filePath = $imageService->upload($image);
                $product->images()->create(['path' => $filePath]);
            }
        }

        return redirect(route('admin.products.index'))
            ->with(['status' => 'The product has been created!']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->toArray();
        return view('admin/products/edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->update([
            'SKU' => $request->get('SKU'),
            'name' => $request->get('name'),
            'small_description' => $request->get('small_description'),
            'price' => $request->get('price')
        ]);

        if (!empty($request->file('thumbnail'))){
        $imageService = app()->make(\App\Services\Contract\ImageServiceInterface::class);
        $filePath = $imageService->upload($request->file('thumbnail'));
        $oldImage = $product->images()->first();

        if(!is_null($oldImage)){
            $imageService->remove($oldImage->path);
        }

        if (is_null($oldImage)){
            $product->images()
                ->create([
                    'path' => $filePath
                ]);

        }else{
            $product->images()
                ->update([
                    'path' => $filePath
                ]);
        }


    }


        return redirect(route('admin.products.index'))
            ->with(['status' => 'The product was successfully updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
       // $product->images()->delete();


        return  redirect(route('admin.products.index'))
            ->with(['status' => 'This product was successfully removed!']);
    }
}
