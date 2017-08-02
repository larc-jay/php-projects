         <div class="col-md-10">
         	 	<div class="page-bg">
         			 <div class="row">
						<div class="col-md-12">
								<h3>
								<div class="msg"><?php if($msg !=null){ echo $msg;}?></div>
								</h3>
								<div class="tab-content">
									<div id="users" class="tab-pane fade">
										<div class="amii-users">
											 <div class="row row-bg">
								         			     <div class="col-sm-3"><label>Name</label></div>
								         			     <div class="col-sm-3"><label>Email</label></div>
								         			     <div class="col-sm-3 "><label>Date of Birth</label></div>
								         			     <div class="col-sm-3"><label>Country</label></div>
								         	</div>
								         	<?php foreach($users as $user){?>
								         		 <div class="row">
								         		 <div class="col-sm-3"><?=$user['first_name'].' '.$user['last_name']?></div>
								         		 <div class="col-sm-3"><?=$user['email']?></div>
								         		 <div class="col-sm-3"><?=$user['dob']?></div>
								         		 <div class="col-sm-3"><?=$user['country']?></div>
								         		 </div>
								         	<?php }?>
										</div>
									</div>
									<div id="main-cat" class="tab-pane fade">
										<div class="amii-main-cat-data"> </div>
									</div>
									<div id="sub-cat" class="tab-pane fade">
										<div class="amii-sub-cat-data"> </div>
									</div>
									<div id="course-enrollment" class="tab-pane fade">
										<div class="amii-course-enrollment-data"> </div>
									</div>
									<div id="add-main-cat" class="tab-pane fade in active">
										<div class="amii-add-main-cat-data"> </div>
									</div>
									<div id="add-sub-cat" class="tab-pane fade">
										<div class="amii-add-sub-cat-data"> </div>
									</div>
								</div>
						</div>
					</div>
         		</div>
         </div>
  <?php  echo ' </div> </div> </div>';
