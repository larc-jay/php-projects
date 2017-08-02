<div class="row grl-bg">
	<div class="col-md-12">
		<div class="row pdngr">
			<div class="col-sm-12">
				<h4>Search Result for "<?=$keyword?>"</h4><br />
				Found <?=count($courses)?> Results
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 pdngr">
				<?php foreach ($courses as $course){?>
					<div class="row  white-bg pdng">
						<div class="col-sm-2 ">
							<img alt="" src="<?=base_url()?>_static/assets/img/blank.png" style="padding: 15px 0px 0px 25px;">
						</div>
						<div class="col-sm-10 pdng">
							<span style="float: left;font-size:1.3em;">
								<a href="<?=WEBPATH?>courses/coursesvenders/<?=$course['cslug'] ?>" style="color:#0088cc">
									<?=$course['coursename']?> 
								</a>
							</span>
							<span style="float: right;color:#FFC300;font-weight:bold;font-size: 1.3em;">Starting from :<?=$course['price']?></span>
							<div class="clear"></div>
							<p style="float: left;color:#8c8c8c">Provided by <?=$course['vcount']?> Vendors</p>
							<br />
							<div class="row">
								<div class="col-sm-12">
										<p style="color:#737373"><?=substr(strip_tags($course['cdetails']),0,200)?>....</p>
								</div>
							</div>
						</div>
					</div>
				<?php }?>
			</div>
			<div class="col-md-3 pdngr">
				<div class="row ">
					<div class="col-sm-12 refine">
						Refine
					</div>
				</div>
				<div class="row  white-bg">
					<div class="col-sm-12 pdng" >
						<p style="color:#0088cc;font-size: 1.4em;">Categories</p>
						<?php foreach ($catCourses as $pc){?>
							<?=$pc['cname'] ?>(<?=$pc['ccount'] ?>)<br/>
						<?php }?>
						<br />
					</div>
				</div>
				<br/>
			</div>
		</div>
	</div>
</div>	