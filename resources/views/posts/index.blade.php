@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="" class="sr-only">Body</label>
                    <textarea name="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') 
                    border border-red-500 @enderror" id="body" cols="10" rows="5"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded">Post</button>
                </div>
            </form>

            @if ($posts->count())
               @foreach ($posts as $post)
                   <div class="mb-4">
                       <a href="" class="font-bold">
                           <span class="text-gray-600 text-sm">{{ $post->user->name }}</span>
                           <span>{{ $post->created_at->diffForHumans() }}</span>
                       </a>
                   </div>
                   <p class="mb-4">{{ $post->body }}</p>

                   <div class="flex item-center">
                       <form action="" class="mr-1">
                           <button class="text-blue-500">{{ $post->likes->count(); }} {{ Str::plural('like', $post->likes->count() ) }}</button>
                       </form>
                       <form action="" class="mr-1">
                        <button class="text-blue-500">UnLike</button>
                    </form>
                   </div>
               @endforeach

               {{ $posts->links() }}
            @else
              <div>No post exits</div>
            @endif
        </div>
    </div>
@endsection