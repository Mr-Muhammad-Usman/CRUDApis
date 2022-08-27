<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
@if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
    <a href="{{ route('addProduct') }}">Add product</a>


    <form action="{{ route('filterPrice') }}" method="post">
    @csrf    
    <input type="number" name="startDate" placeholder="Select starting price">
        <input type="number" name="endDate" placeholder="Select ending price">
        <button>Filter</button>
    </form>
@foreach($product as $item)
<div class="card">
  <img src="{{ url('product_images').'/'. $item->productImage->image_url }}" alt="{{$item->productImage->image_url}}" style="width:100%">
  <br>
  <div class="container">
    <h4><b>{{$item->name}}</b></h4> 
    <p>{{ $item->description }}</p>
    <p>{{ $item->price }}</p>
    <a href="{{ route('editProduct').'/'.$item->id}}">update</a> 
    <a href="{{ route('deleteProduct').'/'.$item->id}}">delete</a> 
  </div>
</div>
<br>
@endforeach


</body>
</html> 
