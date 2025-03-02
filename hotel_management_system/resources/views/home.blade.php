@extends('layouts.app')

@section('content')
    <section class="py-">
        <header class="bg-dark py-5">
            <div class="container w-full px-8 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"> Check In with Confidence</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Manage SVD Hotes network Seamlessly and Deliver Exceptional
                        Service."
                    </p>
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
                            <img class="card-img-top" src="{{ asset('storage/' . $hotel->image) }}" alt="" />
                            <!-- hotel other  details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"> {{ $hotel->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>
    @include('layouts.footer')
@endsection
