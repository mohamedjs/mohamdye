<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Property;
use App\Language;
use Validator;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $propertys = Property::query();
      if($request->has('category_id')){
        $propertys = $propertys->whereIn('category_id',(array)$request->category_id);
      }
      if($request->ajax()){
        $propertys = $propertys->with(['pvalue']);
      }
      $propertys = $propertys->get();
      $languages = Language::all();
      if($request->ajax()){
        return $propertys;
      }
      return view('property.index',compact('propertys','languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $property = null;
      $categorys = Category::whereNull('parent_id')->get();
      $languages = Language::all();
      return view('property.form',compact('categorys','property','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
                  'title' => 'required|array',
                  'title.*' => 'required|string',
                  'category_id' => 'required|exists:categories,id',
          ]);

          if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property = new Property();
        $property->fill($request->except('title'));
        foreach ($request->title as $key => $value)
        {
            $property->setTranslation('title', $key, $value);
        }
        $property->save();
        \Session::flash('success', 'Property Created Successfully');
        return redirect('property/'.$request->parent_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $property  = Property::findOrFail($id);
      return redirect('propert_value?property_id='.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $property =  Property::findOrFail($id);
      $categorys = Category::whereNotNull('parent_id')->get();
      $languages = Language::all();
      return view('property.form',compact('property','categorys','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
                'title' => 'required|array',
                'title.*' => 'required|string',
                'category_id' => 'required|exists:categories,id',
      ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $property = Property::findOrFail($id);

        foreach ($request->title as $key => $value)
        {
          $property->setTranslation('title', $key, $value);
        }

        $property->update($request->except('title'));

      \Session::flash('success', 'Property Updated Successfully');
      return redirect('property/'.$request->parent_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $property = Property::findOrFail($id);

      $property->delete();

      \Session::flash('success', 'Property Delete Successfully');
      return back();
    }
}
