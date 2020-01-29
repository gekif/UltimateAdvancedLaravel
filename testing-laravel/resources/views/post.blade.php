<h1>{{ $post->title }}</h1>

<h2>{{ $post->body }}</h2>

<h3>{{ $post->created_at->toFormattedDateString() }}</h3>