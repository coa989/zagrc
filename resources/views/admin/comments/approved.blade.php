@extends('admin.layouts.app')

@section('content')
    <div class="container " >
        <div class="row ">
            @if(!$comments->first())
                <div class="container">
                    <h3 class="text-center">No pending comments!</h3>
                </div>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Author</th>
                        <th scope="col">Body</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Source</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        @php
                            $type = strtolower(class_basename($comment->commentable_type)) . 's';
                        @endphp
                        <tr>
                            <td><a href="{{ route('admin.users.show', $comment->user) }}">{{ $comment->user->name }}</a></td>
                            <td>{{ $comment->body }}</td>
                            <td>{{ $comment->created_at->diffForHumans() }}</td>
                            <td>{{ $comment->updated_at->diffForHumans() }}</td>
                            <td><a href="{{ route("admin.".$type.".show", $comment->commentable_id) }}"><button class="btn btn-primary btn-sm">View</button></a></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.comments.reject', $comment) }}"><button class="btn btn-sm btn-warning mr-1">Reject</button></a>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $comments->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection
