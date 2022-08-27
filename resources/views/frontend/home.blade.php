@extends('layouts.frontend')

@section('content')
<section class="my-5">
    <div class="text-center mb-4">
        <h3>HR VENTURE</h3>
        <h5 class="border-bottom pb-3 d-inline-block">Free Online Workshop</h5>
    </div>
    <div class="container">
        <a href="{{ route('create') }}" class="btn btn-primary float-end mb-1">CREATE</a>
        @include('frontend.partials.message')
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
              <tr>
                <th scope="col">NO</th>
                <th>Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Roll</th>=
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ asset($item->img) }}" alt="img" width="70"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->roll }}</td>
                <td>
                    <a href="{{ route('edit',$item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a href="{{ route('delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</section>
@endsection