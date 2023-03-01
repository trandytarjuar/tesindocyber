@include('ecom.layouts.header')
@include('ecom.layouts.navbar')



<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
    @if($keranjangs->contains('status_checkout', 'Tidak'))
        
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $subtotal = 0; ?>
                                @foreach($keranjangs as $keranjang)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset('storage/public/upload/'.explode(',',$keranjang->image)[0]) }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">{{$keranjang->nama_produk}}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">Rp.{{ number_format($keranjang->harga, 0, ',', '.') }}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="{{$keranjang->qty}}" min="1" max="10" step="1" data-decimals="0" disabled>
                                        </div><!-- End .cart-product-quantity -->
                                        <?php
                                        $quantity = $keranjang->qty;
                                        $harga = $keranjang->harga;
                                        $total = $quantity * $harga;
                                        $subtotal += $total; ?>
                                    </td>
                                    <td class="total-col">Rp.{{ number_format($total, 0, ',', '.') }}</td>
                                    <td class="remove-col">
                                        
                                        <button class="btn-remove" onclick="deleteprod('{{$keranjang->id_produk}}')"><i class="icon-close"></i></button></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table><!-- End .table table-wishlist -->


                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>Rp.{{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr><!-- End .summary-subtotal -->


                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>Rp.{{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                            <?php $id_user = auth()->user()->id; ?>
                            <input type="hidden" value="{{$id_user}}" id="user">
                            <a onclick="showConfirmation()" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{url('ecom/home')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
        @elseif((empty($keranjangs)))
        <p>Your cart is empty.</p>
        <a href="{{url('ecom/home')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
        @else
        <a href="{{url('ecom/home')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
        @endif

    </div><!-- End .page-content -->
</main><!-- End .main -->

@include('ecom.layouts.footer')
@include('ecom.layouts.js')