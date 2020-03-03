<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('sort_id','asc')->get();
        return view('items.index',compact('items'));
        // $items = Item::all();
        // return view('items.index')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        //Create new Item
        $item = new Item; 
        $item->title = $request->input('title'); 
        $item->save(); 

        // Redirect
        return redirect('/items')->with('success', 'New Item Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit')->with('item', $item);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
        ]);

        //Create new Item
        $id = $request->input('item-id');
        $item = Item::find($id); 
        $item->title = $request->input('title'); 
        $item->save(); 

        // Redirect
        return redirect('/items')->with('success', ' Item Updated');
    }

    public function show(Request $request){
        // debug_to_console($request->all());
        // if($request->has('ids')){
        //     $arr = explode(',',$request->input('ids'));
            
        //     foreach($arr as $sortOrder => $id){
        //         $item = Item::find($id);
        //         $item->sort_id = $sortOrder;
        //         $item->save();
        //     }
        //     return redirect('/items')->with('success', ' Item Updated');
        // }
    }

    public function updateorder(Request $request){
                debug_to_console($request->all());
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $item = Item::find($id);
                $item->sort_id = $sortOrder;
                $item->save();
            }
            return redirect('/items')->with('success', ' Item Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete(); 
        return redirect('/items')->with('success', ' Item deleted');

    }

// TODO: delete this function 
    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}
