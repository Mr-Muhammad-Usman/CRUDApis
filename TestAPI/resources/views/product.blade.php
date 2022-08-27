<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
  <h2>Add Product</h2>
  <form method="post" action="{{ route('createProduct') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
      <spam></spam>
    </div>
    <div class="form-group">
      <label for="description">Product Description</label>
      <input type="text" class="form-control" id="description" placeholder="Enter Product Description" name="description">
    </div>
    <div class="form-group">
      <label for="description">Product price</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Product price" name="price">
    </div>
    <div class="form-group">
      <label for="image">Product Image</label>
      <input type="file" class="form-control" id="image"  name="image[]">
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
