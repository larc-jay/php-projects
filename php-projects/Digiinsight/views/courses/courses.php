<script type="text/javascript">
$(function() {
	courseReady();
});
</script>
<div class="row pdngr">
	<div class="col-md-2">
		<h3>View All Courses</h3>
	</div>
	<div class="col-md-10"></div>
</div>
<div class="row" style="padding: 10px;">
	<div class="col-md-2">
		<div style="background:#fbfbfb; box-shadow: 1px 1px 2px #ccc;">
			<div style="background: #a4a5a6; padding: 10px; color: #fff;box-shadow: 3px 1px 0 0 #ccccca;">
				<span class="heading-wh-3">Course by Category</span>
			</div>	
			<br />
			<div style="margin-left:10px;">
			<?php foreach ($categories as $category){?>
				<p class="cs-index">
					<a href="#search-by-category"  _cid="<?php echo $category['id']; ?>" style="color: #216fa2" class="search-by-cat-name"><?php echo $category['name']; ?></a>
				</p>
			<?php }?>
			<p>&nbsp;</p>
			</div>
		</div>
	</div>
	<div class="col-md-10" style="padding: 0 10px;">
		<div class="row">
			<div class="col-md-12" style="background: #a4a5a6; padding: 10px; color: #fff">
				<strong>Course By Name </strong>
				<a href="#search-course" class="scbn">#</a> 
				<a href="#search-course" class="scbn">A</a> 
				<a href="#search-course" class="scbn">B</a>
				<a href="#search-course" class="scbn">C</a>
				<a href="#search-course" class="scbn">D</a>
				<a href="#search-course" class="scbn">E</a>
				<a href="#search-course" class="scbn">F</a>
				<a href="#search-course" class="scbn">G</a>
				<a href="#search-course" class="scbn">H</a>
				<a href="#search-course" class="scbn">I</a>
				<a href="#search-course" class="scbn">J</a>
				<a href="#search-course" class="scbn">K</a>
				<a href="#search-course" class="scbn">L</a>
				<a href="#search-course" class="scbn">M</a>
				<a href="#search-course" class="scbn">N</a>
				<a href="#search-course" class="scbn">O</a>
				<a href="#search-course" class="scbn">P</a>
				<a href="#search-course" class="scbn">Q</a>
				<a href="#search-course" class="scbn">R</a>
				<a href="#search-course" class="scbn">S</a>
				<a href="#search-course" class="scbn">T</a>
				<a href="#search-course" class="scbn">U</a>
				<a href="#search-course" class="scbn">V</a>
				<a href="#search-course" class="scbn">W</a>
				<a href="#search-course" class="scbn">X</a>
				<a href="#search-course" class="scbn">Y</a>
				<a href="#search-course" class="scbn">Z</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="padding: 10px;">
				<div class="default-course" style="display: block">
					<?php echo $courseindex;?>
				</div>
				<div class="course-list"></div>
			</div>
		</div>
</div>
</div>

