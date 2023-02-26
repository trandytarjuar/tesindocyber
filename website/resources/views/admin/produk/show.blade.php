@include('admin.layouts.header')


<!-- ========== Left Sidebar Start ========== -->
@include('admin.layouts.sidebar')
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


<!-- Topbar Start -->
@include('admin.layouts.navbar')
<!-- end Topbar -->

<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Indocyber</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product Details</a></li>
                        <li class="breadcrumb-item active">{{ $produk->nama_produk }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Product Details {{ $produk->nama_produk }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <!-- Product image -->
                            <a href="javascript: void(0);" class="text-center d-block mb-4">
                                <img src="{{ asset('storage/public/upload/'.explode(',',$produk->image)[0]) }}" class="img-fluid" style="max-width: 280px;" alt="Product-img">
                            </a>

                            <div class="d-lg-flex d-none justify-content-center">
                                @foreach(explode(',', $produk->image) as $image)
                                <a href="javascript: void(0);">
                                    <img src="{{ asset('storage/public/upload/'.$image) }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img">
                                </a>

                                @endforeach
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-7">
                            <form class="ps-lg-4">
                                <!-- Product title -->
                                <h3 class="mt-0">{{ $produk->nama_produk }}<a href="javascript: void(0);" class="text-muted"></a> </h3>
                                <p class="mb-1">Ditambahkan: {{ date('d-m-Y', strtotime($produk->created_at)) }}</p>
                                <!-- <p class="font-16">
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                    <span class="text-warning mdi mdi-star"></span>
                                </p> -->

                                <!-- Product stock -->
                                <!-- <div class="mt-3">
                                    <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                </div> -->

                                <!-- Product description -->
                                <div class="mt-4">
                                    <h6 class="font-14">Harga:</h6>
                                    <h3> Rp.{{ number_format($produk->harga, 0, ',', '.') }}</h3>
                                </div>

                                <!-- Quantity -->


                                <!-- Product information -->
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="font-14">Stock:</h6>
                                            <p class="text-sm lh-150">{{ $produk->stock }}</p>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                    <a href="{{url('/admin/produk')}}" class="btn btn-danger">Back</a>



                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

</div>
<!-- container -->

</div>
<!-- content -->

<!-- Footer Start -->
@include('admin.layouts.footer')