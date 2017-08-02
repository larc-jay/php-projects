 <script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
 <script type="text/javascript">
    $(function() {
      	 $("#program").change(function() {
				var cid  = $('#program').val();
				if(cid=='0'){
					return false;
				}
				$.ajax({
		              type:'post',
		              url:'getCourseDesc',
		              dataType:'json',
		              data:{'courseid':cid},
		              success:function(data){
		            	  CKEDITOR.instances['jq-cc-desc'].setData(data.description);
		              },
		              error:function(err) {
		                  alert('Error');
		               }
				});
 	 });
        
    	$('#jq-course-descr').click(function(){
			var courseid = $('#program').val();
			var desc = CKEDITOR.instances['jq-cc-desc'].getData();
			 $.ajax({
	               type:'post',
	               url:'addCourseDescription',
	               data:{'courseid':courseid,'desc':desc},
	               success:function(data){
	                   $('#program').val('');
	                   CKEDITOR.instances['jq-cc-desc'].setData('');
	                   $('.cd-msg').html('Course description added').show();
	               },
	               error:function(err) {
		                 $('.cd-msg').html('Error').show(); 
		            }
	             });
    	});

    } );
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'dashboard/');
 }
 ?>
<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
						<h4><u>Add course desccription</u></h4>
						<div class="row" >
							<div class="col-sm-2"><label>Select course :</label></div>
							<div class="col-sm-10">
								<select id="program"  class="form-control"  style="width:50%">
								         <option value="0">------Select course------</option>
									<?php foreach($courses as $course){?>
										<option value="<?=$course['id'] ?>"><?=$course['name'] ?> </option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2"><label>Description :</label></div>
							<div class="col-sm-10">
							    <textarea class="form-control" rows="3"	 id="jq-cc-desc"></textarea> 
								<script>CKEDITOR.replace('jq-cc-desc');</script>
							</div>
						</div>
						<div class="row" >
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
							<button id="jq-course-descr" class="btn btn-default">Submit</button>
							<div class="cd-msg" style="font-size: 2em;color:green;"> </div>
							</div>
						</div>
<?php } ?>
</div>		
