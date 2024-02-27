<!-- jQuery  -->
<script src="<?= asset('public'); ?>/assets/js/jquery.min.js"></script>
<script src="<?= asset('public'); ?>/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= asset('public'); ?>/assets/js/metismenu.min.js"></script>
<script src="<?= asset('public'); ?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?= asset('public'); ?>/assets/js/waves.min.js"></script>


<script src="<?= asset('public')?>/assets/js/jquery.dataTables.min.js"></script>
<!-- App js -->
<script>
$('#datatable').DataTable();
</script>
<script src="<?= asset('public'); ?>/assets/js/app.js"></script>

<script>
function previewImage(input) {
    // Seçilen dosyanın var olup olmadığını kontrol et
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        // Dosya yüklendiğinde yapılacak işlemler
        reader.onload = function(e) {
            // img-thumbnail sınıfına sahip olan img elementini bul ve src'sini yüklenen resmin veri URLsine ayarla
            $('.img-thumbnail').attr('src', e.target.result);
        }

        // Seçilen dosyayı oku
        reader.readAsDataURL(input.files[0]);
    }
}

// File input değiştiğinde previewImage fonksiyonunu çağır
$(document).ready(function() {
    $('.uploadImage').change(function() {
        previewImage(this);
    });
});


setTimeout(() => {
    $('.alerts').css({
        'display': 'none'
    });
}, 2000);
</script>
</body>

</html>