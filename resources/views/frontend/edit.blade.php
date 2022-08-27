@extends('layouts.frontend')

@section('content')
<section class="my-5">
  <div class="text-center mb-4">
      <h3 class="border-bottom pb-3 d-inline-block">UPDATE STUDENT</h3>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card card-body">
          @include('frontend.partials.message')
          <form action="{{ route('update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
              @error('name')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Roll</label>
              <input type="number" name="roll" value="{{ $data->roll }}" class="form-control @error('roll') is-invalid @enderror" placeholder="Enter your roll">
              @error('roll')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Photo</label>
              <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
              <img src="{{ asset($data->img) }}" alt="img" width="100">
              @error('img')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn btn-warning">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection