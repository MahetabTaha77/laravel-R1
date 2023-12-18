<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Car</title>
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
  <h2>Update Car</h2>
  <form name="addcar" id="addcar" method="post" action="{{ route('updatecar',$cars->id)  }}" enctype="multipart/form-data">

    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value="{{ $cars->carTitle }}">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price"  value="{{ $cars->price }}">

    </div>
    <div class="form-group">
        <label for="description">Content :</label>
        <textarea class="form-control" rows="5" id="description" name="description"> {{$cars->description}}</textarea>
       
      </div> 
      <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            <img src=" {{ asset('assets/images/'.$cars->image) }} " alt="cars" style="width:250px;">
            @error('image')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription">Short Description:</label>
            <select name="category_id" id="">
                <option value="">Select Category</option>

                @foreach ($categories as $category )

                 <option value="{{$category->id }}" @selected( $category->id == $cars->category_id)>{{ $category->categoryName }}</option>
                  
                @endforeach
                </select>
        </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($cars->published)> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>
<!-- @selected( $category->categoryName == $cars->category->categoryName) -->