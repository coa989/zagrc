<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Definition;
use App\Models\Post;

class DefinitionController extends Controller
{
    public function index()
    {
        $definitions = Definition::with('user', 'tags')
            ->latest()
            ->paginate(8);

        return view('admin.definitions.index', ['definitions' => $definitions]);
    }

    public function show(Definition $definition)
    {
        $comments = Comment::where('commentable_id', $definition->id)->with('replies', 'user', 'replies.user')->get();
        return view('admin.definitions.show', [
            'definition' => $definition,
            'comments' => $comments
        ]);
    }

    public function destroy(Definition $definition)
    {
        $definition->tags()->detach();

        $definition->delete();

        return redirect()->route('admin.definitions.index');
    }

    public function approve(Definition $definition)
    {
        $definition->update([
            'approved' => true,
            'rejected' => false
        ]);

        return back();
    }

    public function reject(Definition $definition)
    {
        $definition->update([
            'rejected' => true,
            'approved' => false
        ]);

        return back();
    }


    public function approved()
    {
        $definitions = Definition::with('user', 'tags')
            ->where('approved', true)
            ->latest()
            ->paginate(8);

        return view('admin.definitions.approved', ['definitions' => $definitions]);
    }

    public function rejected()
    {
        $definitions = Definition::with('user', 'tags')
            ->where('rejected', true)
            ->latest()
            ->paginate(8);

        return view('admin.definitions.rejected', ['definitions' => $definitions]);
    }

    public function pending()
    {
        $definitions = Definition::with('user', 'tags')
            ->where('approved', false)
            ->where('rejected', false)
            ->latest()
            ->paginate(8);

        return view('admin.definitions.pending', ['definitions' => $definitions]);
    }
}
