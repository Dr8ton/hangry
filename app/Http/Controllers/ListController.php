<?php

namespace App\Http\Controllers;

use App\Item;

use Illuminate\Http\Request;


class ListController extends Controller
{
    public function index(Request $request){
        $data = Menu::orderBy('sort_id','asc')->get();
        return view('menu',compact('data'));
    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $item = Item::find($id);
                $item->sort_id = $sortOrder;
                $item->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
}