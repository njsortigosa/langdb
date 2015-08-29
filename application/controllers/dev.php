<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dev extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     var $container = 'container';
     public function __construct()
       {
            parent::__construct();     
            
            //$this->load->library('userlib');
            $this->load->helper('common');   
            $this->load->helper('cookie');
       }
	public function index()
	{
           
            $this->home();
	}
        
        public function home()
	{              
                if(is_admin()){
                
                $data['page'] = $this->load->view("dev/index",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                 echo "You are not authorized to access this page";
                }
	} 
         public function fields()
	{              
                if(is_admin()){
                
                $data['page'] = $this->load->view("dev/fields",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                 echo "You are not authorized to access this page";
                }
	} 
        
         public function codes()
	{              
                if(is_admin()){
                
                $data['page'] = $this->load->view("dev/codes",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                 echo "You are not authorized to access this page";
                }
	} 
        public function delete_item(){
            $this->load->model('dv');
            $table = $this->input->post('table');
            $id_name = $this->input->post('id_name');
            $id = $this->input->post('id');
            $this->dv->delete_entry($table,$id_name,$id);
        }
        
        public function offline_page(){
            
              $this->load->view('contents/error_pages/offline_page');
                
            
        }
        public function test()
	{              
                $this->load->model('usermodel');
                $this->load->model('budget');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("dev/test",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        function unAuthorizeduser(){
            redirect(base_url()."auth/login","location");
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */