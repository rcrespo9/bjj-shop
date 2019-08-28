<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Resources\ProductResource;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->query('name');
        $category = $request->query('category');
        $price_order = $request->query('price_order');

        return ProductResource::collection(
            Product::where('name', 'LIKE', "%{$name}%")
            ->when($category, function($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($price_order, function($query, $price_order) {
                return $query->orderBy('price', $price_order);
            })
            ->get()
        );
    }
}
