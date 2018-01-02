<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Store;
use App\Models\Produk;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard(){
    	return view('seller.index', ['user' => User::findOrFail(Auth::user()->id),
                                     'rentals' => Rental::join('produks', 'rentals.produk_id', '=', 'produks.id')->where('produks.store_id', '=', Auth::user()->store->id)->get()
    ]);
    }

    public function createStore(Request $request, $id)
    {
    	$this->validate($request, [
            'store_name'   => 'required|min:5',
            'slogan'       => 'required|min:10',
            'deskripsi'    => 'required|min:10',
        ]);

        $store = Store::create([
        	'store_name' => $request->store_name,
        	'slogan'     => $request->slogan,
        	'deskripsi'  => $request->deskripsi,
        	'user_id'    => $id,
        ]);

        $user = User::where('id', '=', $id)->first();
        $user->role = 1;
        $user->update();

        return redirect('/')->with('info','Your Store is Successfully Created');
    }

    public function getStore($name)
    {
        $store = Store::where('store_name', '=', $name)->first();

        return view('seller.profile_store')->with('store', $store);
    }

    public function addProduk(Request $request){
        if( $request->isMethod('post') ){
            $this->validate($request, [
                'category'  => 'required|min:0',
                'name'      => 'required|max:15',
                'quantity'  => 'required|min:1',
                'price'     => 'required',
                'picture'   => 'required|mimes:jpeg,jpg,png|max:1000',
                'deskripsi' => 'required|min:10'
            ]);

            $produk = new Produk();
            $produk->produk_name = $request->name;
            $produk->price       = $request->price;
            $produk->quantity    = $request->quantity;
            $produk->deskripsi   = $request->deskripsi;
            $produk->tag_id      = $request->category;
            $produk->store_id    = $request->id_store;

            $file = $request->file('picture');
            $date = date('dmyhis');
            $filename = $produk->produk_name.'_'.$date.'_'.$file->getClientOriginalName();
            $request->file('picture')->move('images/produk/', $filename);

            $produk->picture     = $filename;
            $produk->save();

            return redirect('/seller/add_produk')->with('info','Product Successfully Added');
        }

        return view('seller.add_produk', ['tags' => Tag::all(),
                                          'user' => User::findOrFail(Auth::user()->id)
                                         ]);
    }

    public function getListProduk(Request $request){
        if( $request->isMethod('post') ){
            $start = $request->start;
            $length = $request->length;
            
            if( !empty($request->search) )
                $search = $request->search['value'];
            else
                $search = null;

            $store = Store::where('user_id', '=', Auth::user()->id)->first();
            
            $data = Produk::join('tags', 'produks.tag_id', '=', 'tags.id')
                    ->where("produks.store_id", '=', $store->id)
                    ->select('produks.id as id',
                             'produks.produk_name as produk_name',
                             'produks.price as price',
                             'produks.quantity as quantity',
                             'tags.tag_name as category',
                             'produks.created_at as date_created')
                    ->orderBy('produks.created_at', 'dsc')
                    ->paginate($length, ["*"], 'page', $start/$length+1);

            $result = collect([
                'draw' => intval($request->draw),
                'recordsTotal' => $data->total(),
                'recordsFiltered' => $data->total()
            ]);

            return response()->json($result->merge($data));
        }
        return view('seller.list_produk', ['user' => User::findOrFail(Auth::user()->id),
                                           'tags' => Tag::all()]);
    }

    public function deleteProduk(Request $request)
    {   
        $data = Produk::join('tags', 'produks.tag_id', '=', 'tags.id')
                ->where("produks.id", '=', $request->id);
        $data->delete(); 
        return response()->json([
            'success' => true,
        ]);
    }

    public function editProduk(Request $request)
    {   
        $produk = Produk::find($request->edit_id);
        $produk->produk_name = $request->edit_produk_name;
        $produk->quantity = $request->edit_quantity;
        $produk->price = $request->edit_price;
        $produk->tag_id = $request->edit_category;
        $produk->save();
        
        return response()->json([
            'success' => true,
        ]);
    }

    public function getProfileStore($id)
    {
        $store = Store::where('id', '=', $id)->first();
        $id_user = $store->user_id;
        
        if($id_user != Auth::user()->id){
            $store->visitor += 1;
            $store->save();
        }

        return view('seller.profile_store', ['user' => User::where('id', '=', $id_user)->first(),
                                             'produks' => Produk::where('store_id', '=', $id)->paginate(8),
                                             'rentals' => Rental::join('produks', 'rentals.produk_id', '=', 'produks.id')->where('produks.store_id', '=', $id_user)->get()
                                            ]);
    }

    public function getHistory($id){
        $id = intval($id);

        if( Auth::user()->id != $id )
            abort(403);
        else
            return view('seller.history', ['user' => User::findOrFail(Auth::user()->id),
                                           'rentals' => Rental::join('produks', 'rentals.produk_id', '=', 'produks.id')->where('produks.store_id', '=', Auth::user()->store->id)->get()
                                          ]);

    }

    public function postHistory(Request $request, $id){
        $id = intval($id);

        $rental = Rental::where('id', '=', $id)->first();
        $rental->status = intval($request->choice);
        $rental->save();

        return view('seller.history', ['user' => User::findOrFail(Auth::user()->id),
                                           'rentals' => Rental::join('produks', 'rentals.produk_id', '=', 'produks.id')->where('produks.store_id', '=', Auth::user()->store->id)->get()
                                          ]);
    }
}
