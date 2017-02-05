<?php snippet('header') ?>

<?php echo js(array(
          'assets/js/caman.full.js'
        )) ?>

<main>
<div class="container">
  <header class="site-header cf">
      <div class="cf"></div>
  </header>

  	<?php echo $page->text()->kirbytext() ?>

  
<div class="row">


<div class="overlayDiv">
  	<input type="file" accept="image/*" onchange="loadFile(event)" id="file" class="inputfile" />
	<label for="file">Upload Profile Image</label>

	<img id="overlay-img" src="/content/overlay/plain.png"/>
</div>
	<script>
	  var loadFile = function(event) {
	    var reader = new FileReader();
	    reader.onload = function() {
	      createOverlay(reader.result);
	    };
	    reader.readAsDataURL(event.target.files[0]);
	  };

	var createOverlay = function(uploadImage) {
	  	var baseImg = uploadImage;
	  	Caman("#overlay-img", function () {
			this.brightness(5).render();
			this.newLayer(function() {
			    this.setBlendingMode("normal");
			    this.opacity(100);
			    this.overlayImage(baseImg);
		  	});

		  	this.newLayer(function() {
			    this.setBlendingMode("normal");
			    this.opacity(90);
			    this.overlayImage('/content/overlay/overlay.png');
		  	});

		  	$('#overlay-img').removeAttr('style');
		});

		$('#overlay-img').removeAttr('style');
		//$("#overlay-img").css("width", "400px");

	};
	</script>

<div class="madeBy">Made by <a href="http://dzvonyar.com/" target="_blank">Dora Dzvonyar</a> using <a href="http://camanjs.com/" target="_blank">CamanJS</a></div>

</div>


  </div>
</main>


<?php snippet('footer') ?>
