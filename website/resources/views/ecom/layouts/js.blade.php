<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            event.preventDefault();

            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: '/ecom/login',
                type: 'POST',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'email': email,
                    'password': password,
                },
                success: function(response) {
                    if (response.success) {
                        $('#loginModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Youre Loggedin',
                        })

                        $('#loginModal').modal('hide');
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,

                        })

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            })
        })
       
       
        // $("#registerform").on('submit', function(e) {
        //     event.preventDefault();
        //     var nama = $('#nama').val().trim();
        //     // alert(nama);
        //     var email1 = $('#email1').val().trim();
        //     // alert(email1); 
        //     var nohp = $('#nohp').val().trim();
        //     var alamat = $('#alamat').val().trim();
        //     var password1 = $('#password1').val().trim();
        //     var password_confirmation = $('#password_confirmation').val().trim();
        //     var token = $('input[name="_token"]').val();
        //     // alert(token)

        //     // var email_regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        //     // var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        //     var nohp_regex = /^\d+$/;

        //     var valid = true;

        //     if (nama == '') {
        //         valid = false;
        //         alert('Nama harus diisi');
        //     }

        //     if (email1 == '') {
        //         valid = false;
        //         alert('Email harus diisi');
        //     }
        //     if (nohp == '') {
        //         valid = false;
        //         alert('No HP harus diisi');
        //     } else if (!nohp_regex.test(nohp)) {
        //         valid = false;
        //         alert('No HP harus berupa angka');
        //     }

        //     if (alamat == '') {
        //         valid = false;
        //         alert('Alamat harus diisi');
        //     }

        //     if (password1 == '') {
        //         valid = false;
        //         alert('Password harus diisi');
        //     }

        //     if (password_confirmation == '') {
        //         valid = false;
        //         alert('Konfirmasi Password harus diisi');
        //     }
        //     let data = new FormData();
        //     data.append("nama", nama)
        //     data.append("email1", email1)
        //     data.append("nohp", nohp)
        //     data.append("alamat", alamat)
        //     data.append("password1", password1)
        //     data.append("token", token)
        //     $.ajax({
        //         url: '/ecom/register',
        //         method: 'POST',
        //         data: data,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {

        //         },
        //         error: function() {

        //         }
        //     })
        // })
    })
    $("#registerform").on('submit', function(e) {
            event.preventDefault();
            var nama = $('#nama').val().trim();
            var email1 = $('#email1').val();
            alert(email1)
            var nohp = $('#nohp').val().trim();
            var alamat = $('#alamat').val().trim();
            var password1 = $('#password1').val().trim();
            var password_confirmation = $('#password_confirmation').val().trim();

            var email_regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            var nohp_regex = /^\d+$/;
            var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            var token = $('input[name="_token"]').val();

            var valid = true;

            if (nama == '') {
                valid = false;
                alert('Nama harus diisi');
            }

            if (email1 == '') {
                valid = false;
                alert('Email harus diisi');
            } else if (!email_regex.test(email1)) {
                valid = false;
                alert('Email harus valid');
            }

            if (nohp == '') {
                valid = false;
                alert('No HP harus diisi');
            } else if (!nohp_regex.test(nohp)) {
                valid = false;
                alert('No HP harus berupa angka');
            }

            if (alamat == '') {
                valid = false;
                alert('Alamat harus diisi');
            }

            if (password1 == '') {
                valid = false;
                alert('Password harus diisi');
            } else if (!password_regex.test(password1)) {
                valid = false;
                alert('Password minimal 6 karakter, terdiri dari huruf besar, huruf kecil, angka, dan karakter non-alphanumeric (Contoh: !, $, #, atau %)');
            }

            if (password_confirmation == '') {
                valid = false;
                alert('Konfirmasi Password harus diisi');
            } else if (password_confirmation !== password1) {
                valid = false;
                alert('Konfirmasi Password harus sama dengan Password');
            }

            if (valid) {
                let data = new FormData();
                data.append("nama", nama)
                data.append("email1", email1)
                data.append("nohp", nohp)
                data.append("alamat", alamat)
                data.append("password1", password1)
                data.append("token", token)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/ecom/register',
                    method: 'POST',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {

                    },
                    error: function() {

                    }
                })
            }
        })

    function showConfirmation() {
        if (confirm("Apakah produk yang ingin dibeli sudah benar?")) {
            checkout();
        }
    }

    function checkout() {

        var id_user = $("#user").val();
        $.ajax({
            url: '/ecom/cekout/' + id_user,
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message
                })
                window.location.href = "{{ url('ecom/home') }}";
            }
        });
    }
    deleteprod = async (id_produk) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/ecom/delete/' + id_produk,
            method: 'POST',
            data: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Sukses',
                    text: response.message
                })
                location.reload();

            }
        })
    }
    

    addcart = async (productid) => {
        var btnIncrement = document.querySelector(".btn-increment");
        var qtyInput = document.getElementById("qty");
        var currentQty = parseInt(qtyInput.value);
        var newQty = currentQty + 1;
        qtyInput.value = newQty;
        let data = new FormData();
        data.append("newQty", newQty);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/ecom/addtocart/' + productid,
            method: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.message
                    })
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    })
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat menambahkan produk ke keranjang.'
                })
            }
        })
    }

    function updateCartCount(count) {
        var cartCount = document.getElementById('cart-count');
        if (cartCount) {
            cartCount.textContent = count;
        }
    }

    // ambil jumlah produk pada keranjang dari server dan perbarui elemen HTML
    $.ajax({
        url: '/ecom/countKeranjang',
        method: 'GET',
        success: function(response) {
            if (response.success) {
                updateCartCount(response.count);
            }
        },
        error: function() {
            // handle error
        }
    });
</script>