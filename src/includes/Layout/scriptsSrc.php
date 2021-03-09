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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

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

  <?php if($_SESSION['isLoggedIn']):?>
  <script>
  //Verification si email en doublon
  var favBtn = document.querySelectorAll('svg');
  favBtn.addEventListener('click' (e) => {
    var id_chambre = e.path[0].id.slice(8);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      console.log(this);
      if(this.readyState == 4 && this.status == 200){
        if(this.responsetext === " Success"){
          $('#wrapper').prepend(`
          <div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 10002">
          <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" id="toastJS" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body">
                Annonce ajoutée aux favoris !
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div>
        </div>
        `)
        var toast = new bootstrap.Toast(document.getElementById('toastJS'))
        toast.show();
        }
      }
    };
    xmlhttp.open("POST", `${location.origin}/src/controllers/annonces/favoris.php?id_chambre=${id_chambre}`, true);
    xmlhttp.send();
  })

        
  </script>
  <?php endif;?>