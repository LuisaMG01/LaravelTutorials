<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 1500],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 11],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => 100],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => 32000]
    ];

    public function index(): View
    {
        $viewData = [
            "title" => "Products - Online Store",
            "subtitle" => "List of products",
            "products" => self::$products
        ];

        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {

        if (!isset(self::$products[$id - 1])) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = self::$products[$id - 1];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = [
            "title" => "Create product"
        ];

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0', 
        ]);
    
        Session::flash('success', 'Product created successfully!');
        return Redirect::back();
    }

        

} 
