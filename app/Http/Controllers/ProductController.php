<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductPicture;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function content()
    {
        return view('administrator.product.content');
    }

    public function create()
    {
        $categories = Category::all();     
        return view('administrator.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('extra')) 
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
          
        $product = Product::create($data);                    
         
        return redirect()
            ->route('product.content.edit', ['id' => $product->id])
            ->with('mensaje', 'Producto creado');

    }

    public function edit($id)
    {   
        $categories = Category::all();    
        $product = Product::findOrFail($id);
        return view('administrator.product.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request)
    {   

        $data = $request->all();

        if (! $request->has('outstanding'))
            $data['outstanding'] = 0;
        
        $product = Product::find($request->input('id'));

        if($request->hasFile('extra')){
            if (Storage::disk('custom')->exists($product->extra))
                    Storage::disk('custom')->delete($product->extra);
            
            $data['extra'] = $request->file('extra')->store('images/data-sheet', 'custom');
        }

        $product->update($data);        
                    
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $product->images()->create([
                    'image' => $image->store('images/products', 'custom')
                ]);
            }
        }

        return back()->with('mensaje', 'Producto editado correctamente');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function find($id)
    {
        $content = Product::find($id);
        return response()->json(['content' => $content]);
    }

    public function getList()
    {
        return DataTables::of(Product::query())
        ->editColumn('description', function($product) {
            return $product->description;
        })
        ->addColumn('category', function($product) {
            return $product->category->name;
        })
        ->addColumn('actions', function($product) {
            return '<a href="'.route('product.content.edit', ["id" => $product->id]).'" class="btn btn-sm btn-primary rounded-pill far fa-edit"></a><button class="btn btn-sm btn-danger rounded-pill" onclick="modalProductDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'description'])
        ->make(true);
    }

    public function borrarImagenDescriptiva($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->picture_description))
            Storage::disk('public')->delete($product->picture_description);

        $product->picture_description = null;
        $product->save();

        return response()->json([], 200);
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id);
        if (Storage::disk('custom')->exists($producto->extra)) {
            return Response::download($producto->extra);  
        }else{
            return back();
        }
        
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->extra))
            Storage::disk('public')->delete($product->extra);

        $product->extra = null;
        $product->save();

        return response()->json([], 200);
    }

    public function images(Product $product)
    {
        $images = $product->images()->orderBy('order', 'ASC');

        return DataTables::of($images)
        ->editColumn('images', function($i) {
            return '<img src="'.asset($i->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($product) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findImage('.$product->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalImageDestroy('.$product->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'images'])
        ->make(true);
    }


    public function imageCreate(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')) 
            $data['image'] = $request->file('image')->store('images/product', 'custom');
          
        
        ProductPicture::create($data);     
        return response()->json([], 201); 
    }

    public function imageUpdate(Request $request)
    {
        $row = ProductPicture::findOrFail(intval($request->input('id')));
        $data = $request->all();
        if($request->hasFile('image')){
            if (Storage::disk('custom')->exists($row->image)) {
                Storage::disk('custom')->delete($row->image);
            }
            $data['image'] = $request->file('image')->store('images/product', 'custom');
        } 
           
        $row->update($data);
        return response()->json([], 200);
    }

    public function imageDestroy($id)
    {
        $row = ProductPicture::find($id);
        if (Storage::disk('custom')->exists($row->image)) {
            Storage::disk('custom')->delete($row->image);
        }
        $row->delete();
        return response()->json([], 200);
    }

    public function image($id)
    {
        $content = ProductPicture::find($id);
        return response()->json(['content' => $content]);
    }
}
