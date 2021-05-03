<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\God;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function handle_comment(Request $request){
        if($request->input('req') == "new"){
            $request->validate([
                'comment' => 'required|max:80',
            ]);
    
            $god_id = $request->input('godID');
    
            $comment = new Comment();
            $comment->text = $request->input('comment');
            $comment->god_id = $god_id;
            $comment->user_id = $request->input('userID');
            $comment->save();
    
            $god = God::find($god_id);
            $god->comments()->attach($comment->id);
    
    
            return redirect()->route('god', ['id' => $god_id])->with(['success', 'Saved your comment.']);
        }
        else{

            $comment = Comment::find($request->input('commentID'));
            $this->authorize('delete', $comment);
            $god = God::find($request->input('godID'));
            $god->comments()->detach($comment->id);
            $comment->delete();
            return redirect()->back()->with(['success', 'Deleted your comment.']);
        }

    }

    public function edit(Request $request, $id){
        $request->validate([
            'comment' => 'required|max:80',
        ]);

        $comment = Comment::find($id);
        $comment->text = $request->input('comment');
        $comment->save();

        return redirect()->back()->with(['success', 'Saved your comment.']);
    }



}
