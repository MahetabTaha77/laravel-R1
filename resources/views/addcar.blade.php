<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        * {
            direction:   {{__('addcar.page_direction')}};
        }
    </style>
</head>
<body>


<div class="container">
    <div class="text-center">
        <hr>
        <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="btn" style="width: 150px; color:#fff;background-color: #ff545a">{{__('addcar.english')}}</a>
        <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" style="width: 150px; color:#fff;background-color: #ff545a" class="btn">{{__('addcar.arabic')}}</a>
        <hr>
    </div>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <h2>{{__('addCar.pageTitle')}}</h2>
  <form name="addcar" id="addcar" method="post" action="{{url('cars-data')}}"  enctype="multipart/form-data">

    @csrf
    <div class="form-group">
    <label for="title">{{__('addCar.titleLabel')}}</label>
      <input type="text" class="form-control" id="title" placeholder="{{__('addCar.titlePlaceholder')}}" name="carTitle" value="{{ old('carTitle') }}">
     @error('carTitle')
     <div class="alert alert-warning">
      {{ $message }}
      </div>
     @enderror
    </div>
    <div class="form-group">
      <label for="price">{{__('addcar.priceLabel')}}</label>
      <input type="number" class="form-control" id="price" placeholder="{{__('addcar.pricePlaceholder')}}" name="price" value="{{ old('price') }}">
      @error('price')
      <div class="alert alert-warning">
      {{ $message }}
      </div>
     @enderror
    
    </div>
    
    <div class="form-group">
        <label for="description">{{__('addcar.descriptionLabel')}}</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
        @error('description')
        <div class="alert alert-warning">
      {{ $message }}
      </div>
     @enderror
      </div> 
      <div class="form-group">
            <label for="image">{{__('addcar.imageTitle')}}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="category">{{__('addcar.categoryLabel')}}</label>
            <select name="category_id" id="">
                <option value="">{{__('addcar.categorySelect')}}</option>

                @foreach ($categories as $category )

                 <option value="{{$category->id }}">{{ $category->categoryName }}</option>

                @endforeach
                </select>
        </div>

    <div class="checkbox">
      <label><input type="checkbox" name="published"> {{__('addcar.publishedTitle')}}</label>
    </div>
    <button type="submit" class="btn btn-default">{{__('addcar.button')}}</button>
  </form>
</div>

</body>
</html>
