@extends('layouts.app')

@section('content')
<div class="container">
    <h2 align="center" class="mt-5">Edit Room</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="post" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="" class="mb-2">Room Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $room->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $room->description }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <label for="" class="mb-2">Qty</label>
                            <input type="number" class="form-control" name="qty" value="{{ $room->qty }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Hotel</label><br>
                        <select name="hotel_id" id="hotel_id" class="form-control" required>
                            @foreach ($hotels as $id => $name)
                                <option value="{{ $id }}" {{ $room->hotel_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ $room->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$room->status ? 'selected' : '' }}>Deactive</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection