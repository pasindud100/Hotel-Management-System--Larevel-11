@extends('layouts.app')

@section('content')
        <section class="py-5">
            <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Shop in style</h1>
                        <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
                    </div>
                </div>
            </header>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    {{-- get hotels to the ctr from db using foreeach loop --}}
                    @foreach ($hotels as $key => $hotel)                        
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- hotel image-->
                            <img class="card-img-top" src="{{asset('storage/' .$hotel->image)}}" alt="..." />
                            <!-- hotel other  details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"> {{$hotel->name}}</h5>
                                </div>
                            </div>
                            <!-- home actions part-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endsection
       