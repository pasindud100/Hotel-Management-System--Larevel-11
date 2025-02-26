@extends('layouts.app')

@section('content')
<div class="container">
    <h2 align="center" class="mt-5">Hotel Management System</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="post" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="" class="mb-2">Hotel Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <label for="" class="mb-2">Description</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Please select</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-dark mt-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hotels as $key => $hotel)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $hotel->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $hotel->image) }}" class="img img-responsive" width="150px" height="150px">
                        </td>
                        <td>{{ $hotel->description }}</td>
                        <td>{{ $hotel->status ? 'Active' : 'Deactive' }}</td>
                        <td>
                            <a href="{{ route('hotels.edit', $hotel->id) }}">
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </a>
                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection