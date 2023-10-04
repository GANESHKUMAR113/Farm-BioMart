<?php
include("header.php");
$sql = "SELECT * FROM article where article_id='$_GET[articleid]'";
$qsql = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($qsql);
?>

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
		<br>
		<br>
		<br>
          <h3><?php echo $rs['title']; ?></h3>
		  <p>Published on <?php echo date("d-M-Y",strtotime($rs['publish_date'])); ?></p>
        </div>

      </div>
    </section><!-- End Cta Section -->

  <main id="main">



    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <div class="col-lg-12 pt-4 pt-lg-0">
            <p class="font-italic">
			<img src="imgarticle/<?php echo $rs['article_img1']; ?>" style="width: 500px; padding: 10px;" align="left">
			<?php echo $rs['article_description']; ?></p>
          </div>
        </div>
	<div id="google_translate_element">

	</div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

      </div>
    </section><!-- End About Section -->


  </main><!-- End #main -->
  
<?php
include("footer.php");
?>