<?php $page = "Page d'accueil";?>
<?php include("includes/header.php"); ?>

<?php include("includes/slider.php");  ?>

  <main id="main">

  <div class="container">
<div class="row">
<div class="col-12">

<form>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-5">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
    <div class="col-sm-5">
    <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
</form>

</div>
</div>
</div>


  </main><!-- End #main -->

<?php include("includes/footer.php"); ?>



