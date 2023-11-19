@extends('components.partials.layout')
@section('content')
    <section class="bg-sand padding-large">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <a href="#" class="product-image"><img style="witdh: 500px; height: 500px"
                            src="{{ $book->cover ? Storage::url($book->cover) : '' }}"></a>
                </div>

                <div class="col-md-6 pl-5">
                    <div class="product-detail">
                        <h1>{{ $book->title }}</h1>
                        <p>{{ $book->author }}</p>
                        <span class="price colored">${{ $book->price }}</span>

                        <p>
                            {{ $book->description }}
                        </p>
                        {{-- <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p> --}}
                        <form action="{{ route('addToCart', ['id' => request()->route('id')]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" id="" value="{{ $book->id }}" hidden>
                            <input type="text" name="name" id="" value="{{ $book->title }}" hidden>
                            <input type="text" name="qty" id="" value="1" hidden>
                            <input type="text" name="price" id="" value="{{ $book->price }}" hidden>
                            <input type="submit" name="add-to-cart" class="button" value="ADD TO CART">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
