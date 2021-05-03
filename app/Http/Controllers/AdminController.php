<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function block_page(){
        $blocked = User::where('is_blocked', '=',True)->get();
        $not_blocked = User::where('is_blocked', '=',False)->get();
        return view('admin.block', [
            'blocked' => $blocked,
            'not_blocked' => $not_blocked,
        ]);
    }

    public function block_unblock_user(Request $req){
        $this->authorize('can_block', User::class);
        $id = $req->input('user');
        $to_block = User::find($id);
        $to_block->is_blocked = !$to_block->is_blocked;
        $to_block->save();

        if($to_block->is_blocked)
            return redirect()->back()->with('success', 'Blocked '.$to_block->name);
        else
            return redirect()->back()->with('success', 'Unblocked '.$to_block->name);
    }

}
