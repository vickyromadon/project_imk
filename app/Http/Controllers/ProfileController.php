<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
    	$user = User::where('id', '=', $id)->first();

    	return view('user.profile')->with('user', $user);
    }

    public function getEditProfile($id)
    {
    	$user = User::where('id', '=', $id)->first();

        if( Auth::user()->id == $user->id )
    	   return view('user.profile_edit')->with('user', $user);
        else
            return abort(403);
    }

    public function changeEmail(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $this->validate($request, [
            'email_lama' => 'required',
            'email_baru' => 'required',
            'password'   => 'required',
        ]);

        if(Hash::check($request->password, $user->password)){
            $user->email = $request->email_baru;
            $user->update();

            return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info','Email Successfully Changed');
        }
        else{
            return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('danger','The Password You Entered is Incorrect');
        }
    }

    public function changeNoHp(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $this->validate($request, [
            'nomor_baru' => 'required',
            'password'   => 'required',
        ]);
        
        if(Hash::check($request->password, $user->password)){
            $user->number_phone = $request->nomor_baru;
            $user->update();

            return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info','Number Phone Successfully Changed');
        }
        else{
            return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('danger','The Password You Entered is Incorrect');
        }
    }

    public function changeBiodata(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $this->validate($request, [
            'first_name'   => 'required',
            'last_name'    => 'required',
            'address'      => 'required',
            'city'         => 'required',
            'province'     => 'required',
            'email'        => 'required',
            'number_phone' => 'required|min:10',
        ]);

        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->address      = $request->address;
        $user->city         = $request->city;
        $user->province     = $request->province;
        $user->email        = $request->email;
        $user->number_phone = $request->number_phone;

        $user->update(); 

        return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info','Profile Successfully Changed'); 
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $this->validate($request, [
            'kata_sandi_lama'   => 'required',
            'kata_sandi_baru'   => 'required|min:6',
            'ulang_kata_sandi'  => 'required|min:6',
        ]);

        if( Hash::check($request->kata_sandi_lama, $user->password) ){
            if( $request->kata_sandi_baru == $request->ulang_kata_sandi ){
                $password = bcrypt($request->kata_sandi_baru);
                $user->password = $password;

                $user->update();

                return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info','Password Successfully Changed');
            }
            else{
                return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('danger','"Kata sandi baru" and "Ulang kata sandi" is not matching');
            }
        }
        else{
            return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('danger','The Password You Entered is Incorrect');
        }
    }

    public function changeFoto(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $this->validate($request, [
            'foto_profile'   => 'required|mimes:jpeg,jpg,png|max:1000',
        ]);

        $file = $request->file('foto_profile');
        $date = date('dmyhis');
        $filename = $user->name.'_'.$date.'_'.$file->getClientOriginalName();

        $request->file('foto_profile')->move('images/users/', $filename);

        $user->picture = $filename;
        $user->update();

        return redirect()->route('profile.edit', ['id' => Auth::user()->id])->with('info','Picture Profile Successfully Changed');
    }
}
