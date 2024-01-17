<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Pages extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('page_model');
        // Datas -> libraries ->BaseController / This function used load user sessions
        $this->datas();
        // isLoggedIn / Login control function /  This function used login control
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('login');
        }
        else
        {
            // isManagerOrAdmin / Admin or manager role control function / This function used admin or manager role control
            if($this->isManagerOrAdmin() == TRUE)
            {
                $this->accesslogincontrol();
            }
        }
		
		$this->load->helper('ckeditor_helper');
 
 
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
 
		$this->data['ckeditor_2'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'content_2',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'width' 	=> 	"100%",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
				'toolbar' 	=> 	array(	//Setting a custom toolbar
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 	=> 	'Green',
						'font-weight' 	=> 	'bold'
					)
				)
 
			)
		);
    }

    /**
     * This function is used to open edit taxs view
     */
    function editHome()
    {            
		$data['records'] = $this->page_model->getHomePageList();           
		$this->global['pageTitle'] = 'Home Page Edit';
		
		$this->loadViews("master/pages/home", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit Zone Types
     */
    function editHomes()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('banner_heading','City Banner Heading','required|trim');
		$this->form_validation->set_rules('banner_description','City Banner Desciprtion','required|trim');
		$this->form_validation->set_rules('banner_heading2','Outstation Banner Heading','required|trim');
		$this->form_validation->set_rules('banner_description2','Outstation Banner Desciprtion','required|trim');
		$this->form_validation->set_rules('banner_heading3','Rentals Banner Heading','required|trim');
		$this->form_validation->set_rules('banner_description3','Rentals Banner Desciprtion','required|trim');
		$this->form_validation->set_rules('about_heading','About Us Heading','required|trim');
		$this->form_validation->set_rules('about_description','About Us Desciprtion','required|trim');
		$this->form_validation->set_rules('fleet_heading','Fleet Heading','required|trim');
		$this->form_validation->set_rules('fleet_description','Fleet Desciprtion','required|trim');
		$this->form_validation->set_rules('service_heading','Service Heading','required|trim');
		$this->form_validation->set_rules('service_description','Service Desciprtion','required|trim');
		$this->form_validation->set_rules('service_one','Service One Name','required|trim');
		$this->form_validation->set_rules('service_one_description','Service One Description','required|trim');
		$this->form_validation->set_rules('service_two','Service Two Name','required|trim');
		$this->form_validation->set_rules('service_two_description','Service Two Desciprtion','required|trim');
		$this->form_validation->set_rules('service_three','Service Three Name','required|trim');
		$this->form_validation->set_rules('service_three_description','Service Three Desciprtion','required|trim');
		$this->form_validation->set_rules('feature_heading','Feature Heading','required|trim');
		$this->form_validation->set_rules('feature_description','Feature Desciprtion','required|trim');
		$this->form_validation->set_rules('feature_one','Feature One','required|trim');
		$this->form_validation->set_rules('feature_one_description','Feature One Desciprtion','required|trim');
		$this->form_validation->set_rules('feature_two','Feature Two','required|trim');
		$this->form_validation->set_rules('feature_two_description','Feature Two Desciprtion','required|trim');
		$this->form_validation->set_rules('feature_three','Feature Three','required|trim');
		$this->form_validation->set_rules('feature_three_description','Feature Three Desciprtion','required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $this->editHome();
        }
        else
        {
            $banner_heading = $this->security->xss_clean($this->input->post('banner_heading')); 
			$banner_description = $this->security->xss_clean($this->input->post('banner_description'));
			
			$banner_heading2 = $this->security->xss_clean($this->input->post('banner_heading2')); 
			$banner_description2 = $this->security->xss_clean($this->input->post('banner_description2'));
			
			$banner_heading3 = $this->security->xss_clean($this->input->post('banner_heading3')); 
			$banner_description3 = $this->security->xss_clean($this->input->post('banner_description3'));
			
			
			$about_heading = $this->security->xss_clean($this->input->post('about_heading'));
			$about_description = $this->security->xss_clean($this->input->post('about_description'));
			$fleet_heading = $this->security->xss_clean($this->input->post('fleet_heading'));
			$fleet_description = $this->security->xss_clean($this->input->post('fleet_description'));
			$service_heading = $this->security->xss_clean($this->input->post('service_heading'));
			$service_description = $this->security->xss_clean($this->input->post('service_description'));
			$service_one = $this->security->xss_clean($this->input->post('service_one'));
			$service_one_description = $this->security->xss_clean($this->input->post('service_one_description'));
			$service_two = $this->security->xss_clean($this->input->post('service_two'));
			$service_two_description = $this->security->xss_clean($this->input->post('service_two_description'));
			$service_three = $this->security->xss_clean($this->input->post('service_three'));
			$service_three_description = $this->security->xss_clean($this->input->post('service_three_description'));
			$feature_heading = $this->security->xss_clean($this->input->post('feature_heading'));
			$feature_description = $this->security->xss_clean($this->input->post('feature_description'));
			$feature_one = $this->security->xss_clean($this->input->post('feature_one'));
			$feature_one_description = $this->security->xss_clean($this->input->post('feature_one_description'));
			$feature_two = $this->security->xss_clean($this->input->post('feature_two'));
			$feature_two_description = $this->security->xss_clean($this->input->post('feature_two_description'));
			$feature_three = $this->security->xss_clean($this->input->post('feature_three'));
			$feature_three_description = $this->security->xss_clean($this->input->post('feature_three_description'));

			$data = array(
					'banner_heading' => $banner_heading,
					'banner_description' => $banner_description,
					'banner_heading2' => $banner_heading2,
					'banner_description2' => $banner_description2,
					'banner_heading3' => $banner_heading3,
					'banner_description3' => $banner_description3,
					'about_heading' => $about_heading,
					'about_description' => $about_description,
					'fleet_heading' => $fleet_heading,
					'fleet_description' => $fleet_description,
					'service_heading' => $service_heading,
					'service_description' => $service_description,
					'service_one' => $service_one,
					'service_one_description' => $service_one_description,
					'service_two' => $service_two,
					'service_two_description' => $service_two_description,
					'service_three' => $service_three,
					'service_three_description' => $service_three_description,
					'feature_heading' => $feature_heading, 
					'feature_description' => $feature_description, 
					'feature_one' => $feature_one, 
					'feature_one_description' => $feature_one_description,
					'feature_two' => $feature_two,
					'feature_two_description' => $feature_two_description,
					'feature_three' => $feature_three,
					'feature_three_description' => $feature_three_description,
					'updatedBy' => $this->vendorId, 
					'updatedDtm'=>date('Y-m-d H:i:s')
				);
                                
			$result = $this->page_model->editHomePage($data);
	
			if($result > 0)
			{
				$process = 'Home Page Edit';
				$processFunction = 'Pages/editHomePage';
				$this->logrecord($process,$processFunction);
				$this->session->set_flashdata('success', 'Home page edit successful');
			}
			else
			{
				$this->session->set_flashdata('error', 'Home page edit failed');
			}
			redirect('editHome');
		}
    }
	
	function editPage($type)
    {
		$this->load->library('CKEditor');
		$this->load->library('CKFinder');		
		$data['records'] = $this->page_model->getPageList($type);       
		$this->global['pageTitle'] = 'Page Edit';
		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,'../../assets/ckfinder/');  

		$this->loadViews("master/pages/privacy-policy", $this->global, $data, NULL);
    }
	
	function editPages()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('heading','Heading','required|trim');
		$this->form_validation->set_rules('page_type','Page Type','required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $this->editHome();
        }
        else
        {
            $heading = $this->security->xss_clean($this->input->post('heading')); 
			$description = $this->security->xss_clean($this->input->post('description'));
			$page_type = $this->security->xss_clean($this->input->post('page_type')); 
			
			$data = array(
					'heading' => $banner_heading,
					'description' => $banner_description,
					'updatedBy' => $this->vendorId, 
					'updatedDtm'=>date('Y-m-d H:i:s')
				);
                                
			$result = $this->page_model->editPage($page_type, $data);
	
			if($result > 0)
			{
				$process = 'Page Edit';
				$processFunction = 'Pages/editPage';
				$this->logrecord($process,$processFunction);
				$this->session->set_flashdata('success', 'Page edit successful');
			}
			else
			{
				$this->session->set_flashdata('error', 'Page edit failed');
			}
			redirect('editPage/'.$page_type);
		}
    }
}

?>