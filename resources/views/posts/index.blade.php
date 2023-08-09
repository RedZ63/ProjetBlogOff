@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")



	<!-- Le tableau pour lister les articles/posts -->
	
			<!-- On parcourt la collection de Post -->
			
			<h1 class="flex justify-center font-extrabold text-2xl m-0 max-w-full">
				Nos articles 
			</h1>

    <div class="flex flex-row flex-wrap max-w-screen">
        @foreach ($posts as $post)
        <div class="flex flex-col m-3 mt-10">
            
			<a href="{{ route('posts.show', $post) }}" title="Lire l'article" class="inline"><img class="rounded-xl w-64 h-50 m-2 mr-5" class="w-44" src="{{ asset('storage/'.$post->picture) }}"></a>
            
			<a href="{{ route('posts.show', $post) }}" title="Lire l'article" class="inline font-bold text-center text-2xl mr-5 ">{{ $post->title }}</a>
            @auth	
			<a class="text-black hover:text-black text-xl p-2 bg-white-100 border-white border hover:bg-green-500 rounded-xs mr-5 text-center w-full" name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
            
			<form method="POST" action="{{ route('posts.destroy', $post) }}" >
            
			@csrf
            @method("DELETE")
            
			<input class="text-black hover:text-black text-xl p-2 bg-white-100 border-white border hover:bg-red-500 rounded-xs mr-5 w-full" name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" type="submit" value=" Supprimer" >
        </div>
		@endauth
        @endforeach
    </div>
	
@endsection