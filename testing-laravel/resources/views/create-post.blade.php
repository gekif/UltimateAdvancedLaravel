<form action="/store-post" method="post">
    {{ csrf_field() }}
    <input type="text" name="title">
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
    <button>Save Post</button>
</form>