<?php  include 'aconnection.php';   ?>

<?php  include_once 'headtop.php'; ?>





<?php if(isset($_GET['ca'])){       
       if($_GET['ca'] == 'Sale'){ include 'property-details-sale.php'; }
       if($_GET['ca'] == 'Rent'){ include 'property-details-rent.php'; }
       if($_GET['ca'] == 'PG'){ include 'property-details-pg.php'; }
       if($_GET['ca'] == 'Plot'){ include 'property-details-plot.php'; }
   }
   
?>
   
  
  

  <?php include 'footer.php';   include 'footer_links.php';  ?>
<!-- GLightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
  });
</script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $(".alert").fadeOut("slow");
        }, 5000);
    });
</script>
</body>

</html>

