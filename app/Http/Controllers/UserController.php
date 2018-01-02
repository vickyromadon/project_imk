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

class UserController extends Controller
{
    public function howitwork(){
    	return view('user.howitwork');
    }

  	public function getIndex(){
  		$produk = Produk::join('tags', 'produks.tag_id', '=', 'tags.id')
  				  ->orderBy('produks.created_at', 'dsc')->get();

  		return view('index', ['produks' => $produk]);
  	}

  	public function getSingle($id){
		$produk = Produk::where('id', '=', $id)->first();
		
		$produk->views += 1;
		$produk->save();

        return view('user.single', ['produks' => Produk::findOrFail($id)]);
    }

    public function getCategory($id){
    	$id = intval($id);
      $produk = Produk::where('tag_id', '=', $id)->orderBy('created_at', 'dsc')->paginate(5);

    	return view('user.category', ['produks' => $produk,
                                      'stores' => Store::all()
                                     ]);
    }

    public function requestRental(Request $request, $id){
        $id = intval($id);

        $rental = new Rental();
        $rental->user_id    = $id;
        $rental->produk_id  = $request->id_produk;
        $rental->start_rent = $request->start;
        $rental->end_rent   = $request->end;
        $rental->save();

        return redirect('/single/'.$request->id_produk)->with('info','Request Rental Successfully');
    }

    public function getHistory($id){
        $id = intval($id);

        if( Auth::user()->id != $id )
            abort(403);
        else
            return view('user.history', ['rentals' => Rental::where('user_id', '=', $id)->get()]);
    }
}
