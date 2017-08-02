<div class="page-bg">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div style="color: #000; font-size: 1em; text-align: center;background:#ffffff">
			<?php
			foreach($results as $data) {
				echo $data->email."<br>";
			}
			?>
				<p>
				<?php echo $links; ?>
				</p>
			</div>
			<p class="footer">
				Page rendered in <strong>{elapsed_time}</strong> seconds
			</p>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
</div>
