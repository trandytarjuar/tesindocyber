<script>
    //     var myDropzone = new Dropzone("#image", {
    //     url: "{{route('store')}}", // Set the url for your upload script location
    //     paramName: "file", // The name that will be used to transfer the file
    //     maxFiles: 10,
    //     maxFilesize: 5, // MB
    //     addRemoveLinks: true,
    //     accept: function(file, done) {
    //         if (file.name == "wow.jpg") {
    //             done("Naha, you don't.");
    //         } else {
    //             done();
    //         }
    //     }
    // });
    $('#harga').on('keyup', function() {
        var angka = $(this).val();

        var hasilAngka = formatRibuan(angka);

        $(this).val(hasilAngka);
    });

    function formatRibuan(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            angka_hasil = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            angka_hasil += separator + ribuan.join('.');
        }

        angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
        return angka_hasil;
    }
    $('input[type=number][max]:not([max=""])').on('input', function(ev) {
        var $this = $(this);
        var maxlength = $this.attr('max').length;
        var value = $this.val();
        if (value && value.length >= maxlength) {
            $this.val(value.substr(0, maxlength));
        }
    });

    function previewImages() {
        var preview = document.querySelector('#preview');
        var files = document.querySelector('input[type=file]').files;

        function readAndPreview(file) {
            if (/\.(jpe?g|png)$/i.test(file.name)) {
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                }, false);

                reader.readAsDataURL(file);
            }
        }

        if (files) {
            [].forEach.call(files, readAndPreview);
        }
    }

    document.querySelector('input[type=file]').addEventListener('change', previewImages);
</script>