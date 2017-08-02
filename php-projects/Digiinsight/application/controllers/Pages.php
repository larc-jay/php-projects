<?php
class Pages extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('course_model');
		$this->load->library('breadcrumbs');
	}
	public function becomeInstructor()
	{
		
	$this->breadcrumbs->push('Home','/');
	$this->breadcrumbs->push('Become Instructor', '/pages/becomeinstructor');
	//$this->breadcrumbs->unshift('Home', '/');
	// $this->breadcrumbs->push('Page', site_url('section/page') );
		$this->load->view('templates/header');
		$this->load->view('pages/becomeinstructor');
		$this->load->view('templates/footer');
	}
	public function trainingprovider()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Training Provider', '/pages/trainingprovider');
		$this->load->view('templates/header');
		$this->load->view('pages/trainingprovider');
		$this->load->view('templates/footer');
	}
	public function login()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/login');
		$this->load->view('templates/footer');
	}
	public function experts()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Experts', '/pages/experts');
		$this->load->view('templates/header');
		$this->load->view('pages/experts');
		$this->load->view('templates/footer');
	}
	public function courses()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Courses', '/pages/courses');
		$this->load->view('templates/header');
		$this->load->view('pages/courses');
		$this->load->view('templates/footer');
	}
	public function slugconverter($table)
	{
		$data['slugs'] = $this->pages_model->slugconverter($table);
		//$data['slugs']=$table;
		$this->load->view('templates/header');
		$this->load->view('pages/slugconverter',$data );
		$this->load->view('templates/footer');
	}
	public function privacy_policy()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('terms-conditions', '/pages/termsconditions');
		$this->load->view('templates/header');
		$this->load->view('pages/termsconditions');
		$this->load->view('templates/footer');
	}
	public function terms_to_use()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('terms-to-use', '/pages/termstouse');
		$this->load->view('templates/header');
		$this->load->view('pages/termstouse');
		$this->load->view('templates/footer');
	}
	public function refund_policy()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('refund-policy', '/pages/refundpolicy');
		$this->load->view('templates/header');
		$this->load->view('pages/refundpolicy');
		$this->load->view('templates/footer');
	}
	public function auto(){
		$q = strtolower($this->input->get('term'));
		$this->pages_model->getAuto($q);
	}
	public function about(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('About', '/pages/about');
		$this->load->view('templates/header');
		$this->load->view('pages/about');
		$this->load->view('templates/footer');
	}
	public function leadership(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Leadership', '/pages/leadership');
		$this->load->view('templates/header');
		$this->load->view('pages/leadership');
		$this->load->view('templates/footer');
	}
	public function testimonials(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Testimonials', '/pages/testimonials');
		$this->load->view('templates/header');
		$this->load->view('pages/testimonials');
		$this->load->view('templates/footer');
	}
	public function refer_and_earn(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Refer and earn', '/pages/refer-earn');
		$this->load->view('templates/header');
		$this->load->view('pages/refer-earn');
		$this->load->view('templates/footer');
	}
	public function loyality_program(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Loyality', '/pages/loyality');
		$this->load->view('templates/header');
		$this->load->view('pages/loyality');
		$this->load->view('templates/footer');
	}
	
	public function customization(){
		$data['courses'] = $this->course_model->getCourses();
		$this->load->view('templates/contactforcustomization',$data);
	}
	public function sendCustomization(){
		$name =  $this->input->post('name');
		$msg =  $this->input->post('msg');
		$course =  $this->input->post('course');
		$desi =  $this->input->post('desi');
		$org =  $this->input->post('org');
		$email =  $this->input->post('email');
		$contact =  $this->input->post('contact');
		$participant =  $this->input->post('participant');
		echo $msg;
	}
	public function contact(){
		$this->load->helper('captcha');
		$vals = array(
        		'img_path'      => '/home/sharmaka/public_html/digiinsight.com/_static/assets/captcha/',
		        'img_url'       => 'https://www.digiinsight.com/_static/assets/captcha/'
		);
		$cap = create_captcha($vals);
		$data = array(
		        'captcha_time'  => $cap['time'],
		        'ip_address'    => $this->input->ip_address(),
		        'word'          => $cap['word']
		);
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		$cdata['captcha']=$cap['image'];
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Contact', '/pages/contact');
		$this->load->view('templates/header');
		$this->load->view('pages/contact',$cdata);
		$this->load->view('templates/footer');
	}
	public function contactus(){
	$expiration = time() - 7200; // Two hour limit
	$this->db->where('captcha_time < ', $expiration)->delete('captcha');
	// Then see if a captcha exists:
	$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
	$query = $this->db->query($sql, $binds);
	$row = $query->row();

	if ($row->count == 0)
	{
	       $this->output->set_output('You must submit the word that appears in the image.');
	}else{
		
		$this->load->library('email');
		$this->email->from($this->input->post('email'), 'DigiInsight | Learn From Experts');
		$this->email->to('learning@digiinsight.com');
		$this->email->cc('learning@digiinsight.com');
		$this->email->bcc('jay.answer@gmail.com');
		$this->email->subject('Contact us query');
		$this->email->message('Name :'.$this->input->post('name').'<br>Phone :'.$this->input->post('phone').'<br>Organisation :'.$this->input->post('org').'<br><br>'.$this->input->post('msg'));
		if($this->email->send()) {
			$data['results']='success';	
			$this->output->set_output(json_encode($data));
		}else{
			$data['results']='fails';	
			$this->output->set_output(json_encode($data));
		}
	}
	}
	
}
?>