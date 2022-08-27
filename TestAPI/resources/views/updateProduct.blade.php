<!DOCTYPE html>
<html lang="en">
<head>
  <title>API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
  <h2>update Product</h2>
  <form method="post" action="{{ route('updateProduct').'/'.$product->id }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name">
      <spam></spam>
    </div>
    <div class="form-group">
      <label for="description">Product Description</label>
      <input type="text" class="form-control" id="description" value="{{ $product->description }}" name="description">
    </div>
    <div class="form-group">
      <label for="description">Product price</label>
      <input type="number" class="form-control" id="price" value="{{ $product->price }}" name="price">
    </div>
    <div class="form-group">
      <label for="image">Product Image</label>
      <input type="file" class="form-control" id="image"  name="image[]">
  <img src="{{ url('product_images').'/'. $product->productImage->image_url }}" alt="{{$product->productImage->image_url}}" style="width:100%">

    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
