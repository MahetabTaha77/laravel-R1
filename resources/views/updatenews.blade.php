<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <h2>Add News</h2>
  <form name="addnews" id="addnews" method="post" action="{{ route('updatenews',$news->id)  }}">

    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"  value="{{ $news->title }}">
    </div>
    <div class="form-group">
      <label for="Content">Content:</label>
      <input type="text" class="form-control" id="content" placeholder="Enter Content" name="content" value="{{ $news->content }}">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($news->published)> Published</label>

    </div>
    <div class="form-group">
      <label for="Content">Author:</label>
      <textarea class="form-control" rows="5" id="author" name="author">{{$news->author}}</textarea>
    </div>

    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
