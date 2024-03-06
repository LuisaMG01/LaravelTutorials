<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $data1 = "About us - Online Store";
        $data2 = "About us";
        $description = "This is an about page ...";
        $author = "Developed by: Your Name";
        return view('home.about')
            ->with("title", $data1)
            ->with("subtitle", $data2)
            ->with("description", $description)
            ->with("author", $author);
    }  

    public function contact(): View
    {
        $data1 = "email@email.com";
        $data2 = "address # address - address";
        $data3 = "123455678";
        $title = "This is the contact section";
        $subtitle = "There is the information about us";
        return view('home.contact') -> with("email", $data1)
        ->with("address", $data2)
        ->with("phone_number", $data3)
        ->with("title", $title)
        ->with("subtitle", $subtitle);
    }
    
}
