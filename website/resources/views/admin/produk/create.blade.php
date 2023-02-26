@include('admin.layouts.header')


<!-- ========== Left Sidebar Start ========== -->
@include('admin.layouts.sidebar')
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->


<!-- Topbar Start -->
@include('admin.layouts.navbar')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Indocyber</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Form</a></li>
                        <li class="breadcrumb-item active">Form Tambah Barang</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Tambah Barang</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Tambah Produk</h4>



                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <div id="preview"></div>
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" id="image" name="images[]" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required multiple>
                                            @error('image')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_produk" class="form-label">Nama Produk</label>
                                            <input type="text" id="nama_produk" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" required autofocus>
                                            @error('nama_produk')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="harga">Harga</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" aria-describedby="inputGroupPrepend"  required>
                                                @error('harga')
                                                <span role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stok</label>
                                            <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" required>
                                            @error('stock')
                                            <span role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <!--end::Dropzone-->
                                        <div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{url('/admin/produk')}}" class="btn btn-danger">cancel</a>
                                        </div>






                                    </form>
                                </div> <!-- end col -->

                                <!-- end col -->
                            </div>
                            <!-- end row-->
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
</div>


@include('admin.layouts.script')
@include('admin.layouts.js')

<!-- end Topbar -->