<!-- Page Footer-->
<footer class="main-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>Your company &copy; 2017-2019</p>
      </div>
      <div class="col-sm-6 text-right">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
  </div>
</footer>
</div>
</div>
</div>
<!-- JavaScript files-->
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/popper.js/umd/popper.min.js')?>"> </script>
<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/jquery.cookie/jquery.cookie.js')?>"> </script>
<script src="<?=base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=base_url('assets/js/charts-home.js')?>"></script>
<!-- Main File-->
<script src="<?=base_url('assets/js/front.js')?>"></script>
<!-- Custom JAvascript Dynamic -->
<?php if(isset($js)){
  foreach ($js as $js) {
    echo '<script src="'.base_url("assets/js/$js").'"></script>';
  }
}?>

</body>
</html>
