<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form id="loginForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>


                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" role="tabpanel" id="register" aria-labelledby="register-tab">
                                <form id="registerform" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email1" name="email" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="number" class="form-control" id="nohp" name="nohp" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control" id="password1" name="password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password *</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <!-- <a id="signup"class="btn btn-outline-primary-2"><span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i></a> -->
                                        <button type="submit" id="signup" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>


                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div>
@foreach ($produks as $product)
<div class="modal fade" id="addcart-modal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>
                <form>
                    <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                    <div class="form-box">

                        <div class="col-md-10">
                            <div class="product-gallery product-gallery-vertical">

                                <div class="row">

                                    <figure class="product-main-image">
                                        <img id="product-zoom" src="{{ asset('storage/public/upload/'.explode(',',$product->image)[0]) }}" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach(explode(',', $product->image) as $image)
                                        <a class="product-gallery-item active" href="#" data-image="{{ asset('storage/public/upload/'.$image) }}" data-zoom-image="{{ asset('storage/public/upload/'.$image) }}">
                                            <img src="{{ asset('storage/public/upload/'.$image) }}" alt="product side">
                                        </a>


                                        @endforeach
                                    </div><!-- End .product-image-gallery -->

                                </div><!-- End .row -->

                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->nama_produk}}</h1><!-- End .product-title -->
                            <div class="product-price">
                                Rp.{{ number_format($product->harga, 0, ',', '.') }}
                            </div><!-- End .product-price -->
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                <input type="number" id="qty"class="form-control form-control-lg text-center" value="1">
                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <a onclick="addcart('{{$product->id}}')" class="btn-product btn-cart"><span>add to cart</span></a>


                            </div><!-- End .product-details-action -->


                        </div><!-- End .product-details -->
                    </div>
                </form>
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div>
@endforeach