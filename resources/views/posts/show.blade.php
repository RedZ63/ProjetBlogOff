@extends("layouts.app")
@section("title", $post->title)
@section("content")

	<div class= "flex col justify-center mt-10 ">
		<div class= "justify-center">
			<h1 class=text-3xl>{{ $post->title }}</h1>

			<div class="flex flex">
				<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 450px;" class="mt-10 ml-5 ">

				<div class="mt-10 ml-2 mr-2 h-200 ">{{ $post->content }}</div>
			</div>

			<h2 class="mt-10 text-xl ml-10 mb-5">Commentaires :</h2>
    @forelse ($post->comments as $comment)
  
		<div class="card">
			<div class="card-body">
			<div class="font-medium text-base text-gray-800 ml-12">{{ Auth::user()->name }}: {{ $comment->content}}
			</div>
		</div>
            @empty
                <div class="alert alert-info ml-12">Aucun commentaire pour cet article</div>
    @endforelse
	<div class="flex justify-center">
    	<form action="{{ route('comments.store', $post->id) }}" method="POST" class="flex flex-col rounded-lg p-4 wrap">
			@csrf
			<h2> Créer un commentaire</h2>
			<div class="form-group mb-3">
				
				<textarea placeholder= "écrivez ici....." class="form-control @error('content') is-invalid @enderror h-20" name="content" id="content" rows="5"></textarea>
			</div>
			<button type="submit" class="text-black hover:text-black text-xl p-2 bg--100 border-black border hover:bg-yellow-500 rounded-xs ">Commenter</button>
    	</form>
	</div> 
    <div class="flex justify-around mt-5">
        <a href="{{ route('posts.edit', $post) }}" class="text-black hover:text-black text-xl p-2 bg--100 border-black border hover:bg-blue-500 rounded-xs ">Modifier l'article</a>
        <form action="{{ url('posts/'. $post->id) }}" method="POST" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-black hover:text-black text-xl p-2 bg--100 border-black border hover:bg-red-500 rounded-xs">Supprimer l'article</button>
        </form>

			<p><a href="{{ route('posts.index') }}" title="Retourner aux articles" class="text-black hover:text-black text-xl p-2 bg--100 border-black border hover:bg-green-500 rounded-xs" >Retourner aux posts</a></p>
		</div>
	</div>
@endsection