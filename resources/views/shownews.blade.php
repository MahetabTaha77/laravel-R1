<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2> News Detalils</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>news Title : {{ $news->title}} </th><br>
      </tr>
      <tr>
      <th>Description : {{ $news->content}}</th><br>
      </tr>
      <tr>
      <th>Publish : {{ $news->published}}</th><br>
      </tr>
      <tr>
      <th>Author : {{ $news->author}}</th><br>
      </tr>
    </thead>
    
  </table>
</div>

</body>
</html>
