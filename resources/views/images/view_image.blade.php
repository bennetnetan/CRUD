@extends('../layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('images.add') }}" class="btn btn-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Images</a>
  <a href="{{ route('home') }}" class="btn btn-warning"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
  <h3>View all images</h3><hr>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Image id</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
      @foreach($imageData as $data)
      <tr>
        <td>{{$data->id}}</td>
        <td>
       <img src="{{ url('public/Image/'.$data->image) }}"
style="height: 100px; width: 150px;">
    </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
