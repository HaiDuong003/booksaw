@extends('components.partials.layout')
@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colored">
                        <h1 class="page-title">Shop</h1>
                        <div class="breadcum-items">
                            <span class="item"><a href="index">Home /</a></span>
                            <span class="item colored">Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="padding-large">
        <div class="container">
            <ul class="tabs">
                <li data-tab-target="#all-genre" class="active tab">All Genre</li>
                <li data-tab-target="#business" class="tab">Business</li>
                <li data-tab-target="#technology" class="tab">Technology</li>
                <li data-tab-target="#romantic" class="tab">Romantic</li>
                <li data-tab-target="#adventure" class="tab">Adventure</li>
                <li data-tab-target="#fictional" class="tab">Fictional</li>
            </ul>
            <div class="row">

                <div class="products-grid grid">
                    @foreach ($books as $book)
                        <figure class="product-style">
                            <img src="{{ $book->cover ? Storage::url($book->cover) : '' }}" alt="Books"
                                class="product-item">
                            {{-- <form action="" method="POST" enctype="multipart/form-data">
                                @csrf --}}
                            {{-- <input type="submit" class="add-to-cart"
                                    value="Add to
                                Cart"> --}}
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                Cart</button>
                            {{-- </form> --}}
                            <figcaption>
                                <h3><a href="/book_detail/{{ $book->id }}">{{ $book->title }}</a></h3>
                                <p>{{ $book->author }}</p>
                                <div class="item-price">$ {{ $book->price }}</div>
                            </figcaption>
                        </figure>

                        {{-- <figure class="product-style">
                            <img src="images/tab-item2.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Once upon a time</h3>
                                <p>Klien Marry</p>
                                <div class="item-price">$ 35.00</div>
                            </figcaption>
                        </figure>

                        <figure class="product-style">
                            <img src="images/tab-item3.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Tips of simple lifestyle</h3>
                                <p>Bratt Smith</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure>

                        <figure class="product-style">
                            <img src="images/tab-item4.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Just felt from outside</h3>
                                <p>Nicole Wilson</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure>

                        <figure class="product-style">
                            <img src="images/tab-item5.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Peaceful Enlightment</h3>
                                <p>Marmik Lama</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure> --}}

                        {{-- <figure class="product-style">
                            <img src="images/tab-item6.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Great travel at desert</h3>
                                <p>Sanchit Howdy</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure>

                        <figure class="product-style">
                            <img src="images/tab-item7.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Life among the pirates</h3>
                                <p>Armor Ramsey</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure>

                        <figure class="product-style">
                            <img src="images/tab-item8.jpg" alt="Books" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            <figcaption>
                                <h3>Simple way of piece life</h3>
                                <p>Armor Ramsey</p>
                                <div class="item-price">$ 40.00</div>
                            </figcaption>
                        </figure> --}}
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
