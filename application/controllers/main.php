<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
            
            $this->load->helper('common');   
            $this->load->helper('cookie');
            $this->load->helper('url');
       }
	public function index()
	{		
                $this->load->model('langdb_model');
                $data['page'] = $this->load->view("contents/dashboard",null,true);    
		$this->load->view($this->container,$data); 
	}
        
	public function about()
	{		
                $this->load->model('langdb_model');
                $data['page'] = $this->load->view("contents/main/about",null,true);    
		$this->load->view($this->container,$data); 
	}
        
	public function contact()
	{		
                $this->load->model('langdb_model');
                $data['page'] = $this->load->view("contents/main/contact",null,true);    
		$this->load->view($this->container,$data); 
	}
        //Genres
        public function genres()
	{              
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/genres/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_genre()
	{           
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Genre";
                $this->load->view("contents/main/genres/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_genre(){
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
               'genre' => $this->input->post('genre')                                                               );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_genre',$data);
        }
        public function edit_genre()
	{           
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Genre";
                $this->load->view("contents/main/genres/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_genre(){
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'genre' => $this->input->post('genre')                                                               );
            
            $this->langdb_model->update_entry('ldb_genre','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Genres
        
        //Languages
        public function languages()
	{              
                
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/languages/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_language()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Language";
                $this->load->view("contents/main/languages/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_language(){
            
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
                 'language' => $this->input->post('language')                                                               );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_language',$data);
        }
        public function edit_language()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Language";
                $this->load->view("contents/main/languages/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_language(){
            
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'language' => $this->input->post('language')                                                               );
            
            $this->langdb_model->update_entry('ldb_language','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Languages
        
        //Texts
        public function texts()
	{              
                
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/texts/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_text()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Text";
                $this->load->view("contents/main/texts/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_text(){
            
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
                                                                  'title' => $this->input->post('title')                                                                                   
                                                                  ,'author' => $this->input->post('author')                                                                                 
                                                                  ,'year' => $this->input->post('year')                                                                                 
                                                                  ,'content' => $this->input->post('content')                                                                                 
                                                                  ,'language_id' => $this->input->post('language_id')                                                                                 
                                                                  ,'genre_id' => $this->input->post('genre_id') 
                                                                  ,'users_id' => getUserProperty('id')
                        );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_text',$data);
        }
        public function edit_text()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Text";
                $this->load->view("contents/main/texts/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_text(){
            
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'title' => $this->input->post('title')
                    ,'author' => $this->input->post('author')
                    ,'year' => $this->input->post('year') 
                    ,'content' => $this->input->post('content')      
                    ,'language_id' => $this->input->post('language_id')   
                    ,'genre_id' => $this->input->post('genre_id')         
                    );
            
            $this->langdb_model->update_entry('ldb_text','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Texts
        
        //Parts of Speech
        public function psos()
	{              
                
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/psos/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_pos()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Part of Speech";
                $this->load->view("contents/main/psos/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_pos(){
            
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
                                                                  'pos' => $this->input->post('pos')                                                               );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_pos',$data);
        }
        public function edit_pos()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Part of Speech";
                $this->load->view("contents/main/psos/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_pos(){
            
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'pos' => $this->input->post('pos')                                                               );
            
            $this->langdb_model->update_entry('ldb_pos','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Parts of Speech
        
        //Domains
        public function domains()
	{              
                
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/domains/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_domain()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Domain";
                $this->load->view("contents/main/domains/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_domain(){
            
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
                                                                  'domain' => $this->input->post('domain')                                                               );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_domain',$data);
        }
        public function edit_domain()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Domain";
                $this->load->view("contents/main/domains/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_domain(){
            
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'domain' => $this->input->post('domain')                                                               );
            
            $this->langdb_model->update_entry('ldb_domain','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Domains
        
        //Words
        public function words()
	{              
                
                $this->load->model('langdb_model');
                if(isValidUser()){
                
                $data['page'] = $this->load->view("contents/main/words/list",null,true);    
		$this->load->view($this->container,$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
         public function add_word()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Add Word";
                $this->load->view("contents/main/words/add",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        public function save_word(){
            
            $this->load->model('langdb_model');
            if(isValidUser()){
            $data=array(
                                                
                                                                  'word' => $this->input->post('word')                                                                                   
                                                                  ,'meaning' => $this->input->post('meaning')                                                                                 
                                                                  ,'sample_sent' => $this->input->post('sample_sent')                                                                                 
                                                                  ,'english_equiv' => $this->input->post('english_equiv')                                                                                 
                                                                  ,'isloan_word' => $this->input->post('isloan_word')                                                                                 
                                                                  ,'isdisplay' => $this->input->post('isdisplay')                                                                                 
                                                                  ,'std_spelling' => $this->input->post('std_spelling')                                                                                 
                                                                  ,'pri_pos_id' => $this->input->post('pri_pos_id')                                                                                 
                                                                  ,'sec_pos_id' =>  ($this->input->post('sec_pos_id')=="0")?null:$this->input->post('sec_pos_id')                                                                                 
                                                                  ,'domain_id' => $this->input->post('domain_id')                                                             );
            }else{
                    $this->unAuthorizeduser();
                }
            
            $this->langdb_model->insert_entry('ldb_word',$data);
        }
        public function edit_word()
	{           
            
            $this->load->model('langdb_model');
                if(isValidUser()){
                $data['header'] = "Edit Word";
                $this->load->view("contents/main/words/edit",$data);    
                }else{
                    $this->unAuthorizeduser();
                }
	}
        
        public function update_word(){
            
            $this->load->model('langdb_model');
            $id=$this->input->post('id');
            if(isValidUser()){
            $data=array(
                                                                                  'word' => $this->input->post('word')                                                                                                                     ,'meaning' => $this->input->post('meaning')                                                                                                                   ,'sample_sent' => $this->input->post('sample_sent')                                                                                                                   ,'english_equiv' => $this->input->post('english_equiv')                                                                                                                   ,'isloan_word' => $this->input->post('isloan_word')                                                                                                                   ,'isdisplay' => $this->input->post('isdisplay')                                                                                                                   ,'std_spelling' => $this->input->post('std_spelling')                                                                                                                   ,'pri_pos_id' => $this->input->post('pri_pos_id')                                                                                                                   ,'sec_pos_id' =>  ($this->input->post('sec_pos_id')=="0")?null:$this->input->post('sec_pos_id')                                                                                                                   ,'domain_id' => $this->input->post('domain_id')                                                             );
            
            $this->langdb_model->update_entry('ldb_word','id',$id,$data);
            }else{
                    $this->unAuthorizeduser();
                }
        }
        
// END OF Words
        
        function unAuthorizeduser(){
            redirect(base_url()."auth/login","location");
        }
        
        public function delete_item(){
            $this->load->model('langdb_model');
            $table = $this->input->post('table');
            $id_name = $this->input->post('id_name');
            $id = $this->input->post('id');
            $this->langdb_model->delete_entry($table,$id_name,$id);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */