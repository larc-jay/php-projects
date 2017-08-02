			<?php
			$counter=1;
			foreach ($courses as $course){
				if($counter==1){
					echo '<div class="row ci-indx-row" >';
				}
				echo '<div class="col-md-3 ci-indx-col"><a href="coursesvenders/'.$course['slug'].'" style="color:#0088cc;">'.$course['name'].'</a></div>';
				if($counter%4==0 && $counter>0){
					echo '</div>';
					echo '<div class="row ci-indx-row">';
				}
				$counter++;
			}
			if($counter%4==1){ 
				echo '<div class="col-md-9">';
				echo '</div>';
			}
			if($counter%4==2){ 
				echo '<div class="col-md-6">';
				echo '</div>';
			}
			if($counter%4==3){ 
				echo '<div class="col-md-3">';
				echo '</div>';
			}
			if($counter%4==0){ 
				echo '</div>';
			}
			?>
</div>