<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyInfoRequest;
use App\Http\Requests\CompanySliderRequest;

class CompanyController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'empresa')->first();
    }


    public function content()
    {
        $page = Page::where('name', 'empresa')->first();
        $sections   = $page->sections;
        $section1   = $sections->where('name', 'section_1')->first()->contents()->first();
        return view('administrator.company.content', compact('section1'));
    }
    

    public function storeSlider(CompanySliderRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/company','custom');
        Content::create($data);
        return response()->json(['tableReload' => true],201);
    }

    public function CaracteristicasStore(Request $request)
    {
        $request->validate(['image' => 'required'], ['image.required' => 'Imagen es requerida']);
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images/company','custom');
        Content::create($data);
        return back();
    }

    public function updateSlider(CompanySliderRequest $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        }        
        $element->update($data);
    }

    public function updateInfo(Request $request)
    {
        $element = Content::find($request->input('id'));
        $data = $request->all();    
        if($request->hasFile('image')){
            if(Storage::disk('custom')->exists($element->image))
                Storage::disk('custom')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/company','custom');
        } 
        $element->update($data);
        return back();
    }


    public function destroy($id)
    {
        $element = Content::find($id);
        if(Storage::disk('custom')->exists($element->image))
            Storage::disk('custom')->delete($element->image);

        $element->delete();
        return response()->json([], 200);
    }


    public function caracteristicasGetList()
    {
        $elements = Content::where('section_id', 6)->orderBy('order', 'ASC');

        return DataTables::of($elements)
        ->editColumn('image', function($element){
            if (Storage::disk('custom')->exists($element->image)) 
                return '<img src="'.asset($element->image).'" class="img-fluid" style="max-width:100px">';    
        })
        ->editColumn('content_2', function($element){
            return $element->content_2;
        })
        ->addColumn('actions', function($element) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element-caracteristica" onclick="findContent2('.$element->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$element->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image', 'content_2'])
        ->make(true);
    }
}
