<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    protected $page;

    public function __construct(){
        
        $this->page = Page::where('name', 'clientes')->first();
    }

    /**
     * @author Raul castro
     */

    public function index()
    {
        return view('home');
    }
    /**
     * Fin Slider
     */

    public function content()
    {
        return view('administrator.client.content');
    }

    /**
     * @param array $request
     * @author Raul castro
     */

    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required',
        ], [
            'image.required' => 'Imagen es requerida',
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/clients', 'custom');
        $content = Content::create($data);
        return response()->json([], 201);
    }

    public function update(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/clients','custom');
        }        

        $element->update($data);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        $element = Content::find($id);

        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image); 

        $element->delete();

        return response()->json([], 200);
    }

    /**
     * @author Raul castro
     * @return datatable
     */

    public function sliderGetList()
    {
        $elements = Content::where('section_id', 8)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar element"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }
}
