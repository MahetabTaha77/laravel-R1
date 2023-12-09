<!DOCTYPE html>
<html lang="en">
<head>
  <title>Explore List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2> Explore Table</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>ShortDescription</th>
        <th>Price</th>
        <th>Publish</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>

      </tr>
    </thead>
    <tbody>
        @foreach($Post as $Post)
        <tr>
        <td>{{ $Post->title}}</td>
        <td> {{ $Post->ShortDescription}} </td>
        <td>
            @if ($Post->published)
            yes ✅
            @else
            no  ❌  
            @endif
        </td>
        <td><a href="editPost/{{ $Post->id }}" >Edit</a</td>
        <td><a href="ShowPost/{{ $Post->id }}" >Show</a</td>
        <td><a href="deletePost/{{ $Post->id }}" >Delete</a</td>


      </tr>
        @endforeach
      
    </tbody>
  </table>
</div>

</body>
</html>
