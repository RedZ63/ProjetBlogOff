@extends("layouts.app")
@section("title", "Editer un post")
@section("content")

<div class="flex items-center justify-center">

	<!-- Si nous avons un Post $post -->
	@if (isset($post))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

	@endif

		<!-- Le token CSRF -->
		@csrf
		
		<p>
			<label for="title" class="text-xl" >Titre</label><br/>

			<!-- S'il y a un $post->title, on complète la valeur de l'input -->
			<input class="mb-5" type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post" >

			<!-- Le message d'erreur pour "title" -->
			@error("title")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<!-- S'il y a une image $post->picture, on l'affiche -->
		@if(isset($post->picture))
		<p>
			<span>Couverture actuelle</span><br/>
			<img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
		</p>
		@endif

		<p>
			<label for="picture"  class="text-xl">Sélectionner une image</label><br/>
			<input type="file" name="picture" id="picture" class="text-black hover:text-black text-xl p-2 bg-white-100 border-white border hover:bg-blue-500 rounded-xs mr-5">

			<!-- Le message d'erreur pour "picture" -->
			@error("picture")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<p class="mt-5">
			<label for="content" class="text-xl" >Contenu</label><br/>

			<!-- S'il y a un $post->content, on complète la valeur du textarea -->
			<textarea class="" name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>

			<!-- Le message d'erreur pour "content" -->
			@error("content")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<div class="flex justify-center">
			<input type="submit" name="valider" value="Valider" class="text-black hover:text-black text-xl p-2 bg-white-100 border-white border hover:bg-green-500 rounded-xs mr-5 w-100 pg-5 ">
		</div>
	</form>
</div>
@endsection