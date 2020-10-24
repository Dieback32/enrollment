<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
	   	<li style="background-image: url(<?php if(isset($banner->file)){echo base_url().'uploads/home/'.$banner->file;} ?>);">
	   		<div class="overlay-gradient"></div>
	   		<div class="container">
	   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
	   				<div class="slider-text-inner desc">
	   					<h2 class="heading-section"><?php if(isset($getCaption->title)){ echo $getCaption->title; } ?></h2>
	   					<p class="fh5co-lead"><?php if(isset($getCaption->content)){ echo $getCaption->content; } ?></p>
	   				</div>
	   			</div>
	   		</div>
	   	</li>
	  	</ul>
  	</div>
</aside>

