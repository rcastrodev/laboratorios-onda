<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Color;
use App\Content;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'inicio')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        /** Secciones de página */
        $sections   = $page->sections;
        $section1s  = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3   = $sections->where('name', 'section_3')->first()->contents()->first();
        $categories  = Category::where('outstanding', 1)->orderBy('order', 'ASC')->get();
        $clients  = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('section1s', 'section2', 'section3', 'categories', 'clients'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections = $page->sections;
        $section1 = Content::where('section_id', 4)->first();
        $section2 = Content::where('section_id', 5)->first();
        $section3s = Content::where('section_id', 6)->orderBy('order', 'ASC')->get();

        SEO::setTitle('Quienes somos');
        SEO::setDescription(strip_tags($section2->content_2));
        return view('paginas.empresa', compact('section1', 'section2', 'section3s'));
    }

    public function categorias()
    {
        
        SEO::setTitle('productos');
        SEO::setDescription(strip_tags($this->data->description));
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('paginas.categorias', compact('categories'));
    }

    public function categoria($id)
    {

        SEO::setTitle('productos');
        SEO::setDescription(strip_tags($this->data->description));

        $category = Category::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('category_id', $category->id)->orderBy('name', 'ASC')->get();

        return view('paginas.categoria', compact('categories', 'category', 'products'));
    }

    public function producto($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));

        return view('paginas.producto', compact('categories', 'product'));
    }

    public function industrias()
    {
        $section1s = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        SEO::setTitle('industrias');
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.industrias', compact('section1s'));
    }

    public function clientes()
    {
        SEO::setTitle('clientes');
        SEO::setDescription(strip_tags($this->data->description));
        $section1s = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();
        return view('paginas.clientes', compact('section1s'));
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("Contacto"); 
        SEO::setDescription(strip_tags($this->data->description));      
        return view('paginas.contacto');
    }
}
