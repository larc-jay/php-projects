<footer id="footer"  style="padding:2% 5% 0 5%">
 	 		<div class="row">
 	 			<div class="col-md-3"  style="background:#555;font-size:17px;">
 	 				<h4>Company</h4>
 	 				<p><a href="#" class="f-link">DigiInsight</a></p>
 	 				<p><a href="#" class="f-link">Leadership</a></p>
 	 				<p><a href="#" class="f-link">Testimonials</a></p>
 	 			</div>
 	 			<div class="col-md-3"  style="background:#555;font-size:17px;">
 	 			<h4>Opportunity</h4>
 	 				<p><a href="#" class="f-link">Become an Instructor</a></p>
 	 				<p><a href="#" class="f-link">Refer and Earn</a></p>
 	 			</div>
 	 			<div class="col-md-3" style="background:#555;font-size:17px;">
					<h4>Learner's Corner</h4>
						<p><a href="<?=WEBPATH?>courses/trainingcalendar" class="f-link">Training Calendar</a></p>
						<p><a href="<?=WEBPATH?>blog" class="f-link">Blog</a></p>
						<p><a href="#" class="f-link">Loyality Program</a></p>
 	 			</div>
 	 			<div class="col-md-3" style="background:#555;">
 	 				<h1 style="color:#9f9f9f;font-weight:700"> We're Social</h1><br />
 	 				<a href="https://www.facebook.com/digiinsight/" class="social-icon-f"> <i class="fa fa-facebook"></i></a>
 	 				<a href="https://twitter.com/InsightDigi" class="social-icon-t"> <i class="fa fa-twitter"></i></a>
 	 				<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-l"> <i class="fa fa-linkedin"></i></a>
 	 			</div>
 	 		</div>	
 	 		<div class="row">
 	 			<div class="col-md-12" style="font-size:1.5em">
					<hr class="solid-footer">
					<a href="<?=WEBPATH?>pages/terms_to_use" class="f-link">Terms of Use</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?=WEBPATH?>pages/privacy_policy" class="f-link">Privacy Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?=WEBPATH?>pages/refund_policy" class="f-link">Refund & Reschedule Policy</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?=WEBPATH?>pages/contact" class="f-link">Contact Us</a>
					<hr class="solid-footer">
 	 			</div>
 	 		</div>
 	 		<p>&nbsp;</p>
 	 		<div class="row">
 	 			<div class="col-md-12" >
 	 				<div style="font-size:1.5em;color: #fff;cursor: pointer; " class="disclaim">+ Disclaimer</div>
 	 				<p>&nbsp;</p>
 	 				<div class="disclaimer" style="display:none;color:#999999">
		 	 				<ul>
								<li>The Swirl logo&trade; is a trade mark of AXELOS Limited, used under permission of AXELOS Limited. All rights reserved.</li>
								<li>CBAP&reg; is a registered certification mark owned by International Institute of Business Analysis. Certified Business Analysis Professional, EEP and the EEP logo are trademarks owned by International Institute of Business Analysis.</li>
								<li>CISA&reg; is a Registered Trade Mark of the Information Systems Audit and Control Association (ISACA) and the IT Governance Institute.</li>
								<li>IT Infrastructure Library is a [registered] trade mark of AXELOS Limited used, under permission of AXELOS Limited. All rights reserved.</li>
								<li>ITIL&reg; is a [registered] trade mark of AXELOS Limited, used under permission of AXELOS Limited. All rights reserved.</li>
								<li>PMI, PMBOK, PMP, PgMP, CAPM, PMI-RMP, and PMI-ACP are registered marks of the Project Management Institute, Inc</li>
								<li>Certified ScrumMaster&reg; (CSM) and Certified Scrum Trainer&reg; (CST) are registered trademarks of SCRUM ALLIANCE&reg;</li>
								<li>Simplilearn and its affiliates, predecessors, successors and assigns are in no way associated, sponsored or promoted by SAP SE and neither do they provide any SAP based online or real-time courses or trainings</li>
								<li>IIBA&reg;, the IIBA&reg; logo, BABOK&reg; and Business Analysis Body of Knowledge&reg; are registered trademarks owned by International Institute of Business Analysis. </li>
								<li>CISCO&reg;, CCNA&reg;, and CCNP&reg; are trademarks of Cisco and registered trademarks in the United States and certain other countries.</li>
								<li>COBIT&reg; is a trademark of ISACA&reg; registered in the United States and other countries.</li>
								<li>PRINCE2&reg; is a [registered] trade mark of AXELOS Limited, used under permission of AXELOS Limited. All rights reserved.</li>
								<li>The Open Group&reg;, TOGAF&reg; are trademarks of The Open Group.</li>
								<li>CISSP&reg; is a registered mark of The International Information Systems Security Certification Consortium ((ISC)2). </li>
								<li>Professional Scrum Master is a registered trademark of Scrum.org</li>
								<li>MSP&reg; is a [registered] trade mark of AXELOS Limited, used under permission of AXELOS Limited. All rights reserved.</li>
								<li>The APMG-International Finance for Non-Financial Managers and Swirl Device logo is a trade mark of The APM Group Limited.</li>
								
							</ul>
 	 				</div>
 	 				<p>&nbsp;</p>
 	 			</div>
 	 		</div>
	</footer>
	<div class="row">
 	 			<div class="col-md-12" style="text-align: left;background:#434343 ;padding:0px 40px ">
 	 				<img alt="" src="<?=base_url()?>_static/assets/img/DI-Signature.png" style="float:left;padding:1%;height:70px;width:70px"> 
 	 				<p style="color:#a8a8a8;padding:15px 80px;">&copy; 2016 Digiinsight. All Rights Reserved.<br />
 	 				The certification names, logos, social icons are the trademarks of their respective owners.
 	 				</p>
 	 			</div>
 	 </div>	
	<a class="scroll-to-top hidden-mobile visible" href="#"><i class="fa fa-chevron-up"></i></a>
	  <script type="text/javascript">
      $(function (){
    	  login();
    	  loginsignup();
    	  $('.disclaim').click(function(){
  			$('.disclaim').html("- Disclaimer");
  			$('.disclaimer').toggle();
  		});
    	  $("#srch-term").autocomplete({
  		    source: "<?=base_url()?>pages/auto"
  		});	
	  });
     
	</script>
	
    <?php echo  "</body>" ?>
    <?php 
		$tt =& get_instance();
		$param1=array();
		$param1['id']=1;
		$analytics = $tt->db->where($param1)->get('seo_analytics')->row();
	?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', '<?=$analytics->google_analytics?>', 'auto');
  ga('send', 'pageview');

</script>
<?php echo  "</html>" ?>