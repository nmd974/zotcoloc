</div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- script bootstrap -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
<!-- script jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<!--FIN LOADER-->
<script>document.getElementById('loader_wrapper').remove();</script>
<?php if(isset($_SESSION['flash'])):?>
<script>    
    var toast = new bootstrap.Toast(document.getElementById('liveToast'))
    toast.show();
    <?php unset($_SESSION['flash']);?>
</script>
<?php endif; ?>

<!--Script AOS-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>