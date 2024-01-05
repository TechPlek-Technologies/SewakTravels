<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



require APPPATH . '/libraries/BaseController.php';



/**

 * Class : User (UserController)

 * User Class to control all user related operations.

 * @author : Surya Narayan / 005surya@gmail.com

 * @version : 1.0

 * @since : 27.02.2018

 */

class Blogs extends BaseController

{

    /**

     * This is default constructor of the class

     */

    public function __construct()

    {

        parent::__construct();

        $this->load->model('user_model');

        $this->load->model('blogs_model');

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

    }

	

	/**

     * This function used to show Tax

     */

    function blogs()

    {

		$data['blogs'] = $this->blogs_model->get_blogs();



		$process = 'All Blogs';

		$processFunction = 'Manager/Blogs';

		$this->logrecord($process,$processFunction);



		$this->global['pageTitle'] = 'All Blogs';

		

		$this->loadViews("blogs/index", $this->global, $data, NULL);

    }

	

    function addNewblog()

    {

		$process = 'Add Blog';

		$processFunction = 'Manager/Blogs';

		$this->logrecord($process,$processFunction);



		$this->global['pageTitle'] = 'Add Blog';

		

		$this->loadViews("blogs/add", $this->global, NULL);

    }



    

    /**

     * This function is used to add new Tax to the system

     */

    function addNewblogs()

    {

        $this->load->library('form_validation'); 

        $this->form_validation->set_rules('blog_title', 'Blog Title', 'required');

        $this->form_validation->set_rules('short_description', 'Short Description', 'required');

        $this->form_validation->set_rules('description', 'Description', 'required');

       

        if (empty($_FILES['userfile2']['name'])){

            $this->form_validation->set_rules('userfile2', 'Blog Image', 'required');

        }

        

        if($this->form_validation->run() == FALSE)

        {

            $this->addNewblog();

        }

        else

        {

            $title = $this->security->xss_clean($this->input->post('blog_title')); 

            $slug = url_title($this->input->post('blog_title'), "dash", TRUE);

			$image_path = $_FILES['userfile2']['name'];

            $short_description = $this->security->xss_clean($this->input->post('short_description'));

            $description = $this->security->xss_clean($this->input->post('description'));

            $meta_description = $this->security->xss_clean($this->input->post('meta_description'));

            $meta_keywords = $this->security->xss_clean($this->input->post('meta_keywords'));

            $alt_tag = $this->security->xss_clean($this->input->post('alt_tag'));

            $blog_tags = $this->security->xss_clean($this->input->post('blog_tags'));



            $config["upload_path"] = "./assets/blogs";

            $config["allowed_types"] = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";

            $config["max_size"] = "5120";

            $config['encrypt_name'] = TRUE;



            $this->load->library("upload", $config);

          

            

            if(! $this->upload->do_upload('userfile2')){

                $errors = array("error"=> $this->upload->display_errors());

                print_r($errors);

            }

            else{

                $fileData = $this->upload->data();

                $bannerImage = $fileData['file_name'];

            }

            $savedata = array(

                'blog_title' => $title,

                "slug" => $slug,

                'banner_image' =>$bannerImage,

                'short_description' => $short_description,

                'description' => $description,

                'meta_keywords' => $meta_keywords,

                'meta_description' => $meta_description,

                'alt_tag' => $alt_tag,

                'blog_tags' => $blog_tags

            );

            $result = $this->blogs_model->addNewBlog($savedata);

            redirect('blogs');

        }

    }

    

    function deleteblogs($id)

    {

        $result = $this->blogs_model->deleteblog($id);

        redirect('blogs');

    }



    function edit($id)

    {

        $data['blog'] = $this->blogs_model->get_blogs($id);



		$process = 'Edit Blogs';

		$processFunction = 'Manager/Blogs';

		$this->logrecord($process,$processFunction);



		$this->global['pageTitle'] = 'Edit Blogs';

		

		$this->loadViews("blogs/edit", $this->global, $data, NULL);



    }



    

    /**

     * This function is used to add new Tax to the system

     */

    function editBlogs($id)

    {

        $this->load->library('form_validation'); 

        $data['blog'] = $this->blogs_model->get_blogs($id);

        $this->form_validation->set_rules('blog_title', 'Blog Title', 'required');

        $this->form_validation->set_rules('short_description', 'Short Description', 'required');

        $this->form_validation->set_rules('description', 'Description', 'required');

       

        // if (empty($_FILES['userfile2']['name'])){

        //     $this->form_validation->set_rules('userfile2', 'Blog Image', 'required');

        // }

        

        if($this->form_validation->run() == FALSE)

        {

            $this->loadViews("blogs/edit",$data);

        }

        else

        {

            $title = $this->security->xss_clean($this->input->post('blog_title')); 

            $slug = url_title($this->input->post('blog_title'), "dash", TRUE);

			$image_path = $_FILES['userfile2']['name'];

            $short_description = $this->security->xss_clean($this->input->post('short_description'));

            $description = $this->security->xss_clean($this->input->post('description'));

            $meta_description = $this->security->xss_clean($this->input->post('meta_description'));

            $meta_keywords = $this->security->xss_clean($this->input->post('meta_keywords'));

            $alt_tag = $this->security->xss_clean($this->input->post('alt_tag'));

            $blog_tags = $this->security->xss_clean($this->input->post('blog_tags'));



            $config["upload_path"] = "./assets/blogs";

            $config["allowed_types"] = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";

            $config["max_size"] = "5120";

            $config['encrypt_name'] = TRUE;



            $this->load->library("upload", $config);

          

            if($this->upload->do_upload('userfile2')){

                

                $fileData = $this->upload->data();

                // $bannerImage = $this->security->xss_clean($this->input->post('userfile2'));
                $bannerImage = $fileData['file_name'];

                $savedata = array(

                    'blog_title' => $title,
    
                    "slug" => $slug,
    
                    'banner_image' =>$bannerImage,
    
                    'short_description' => $short_description,
    
                    'description' => $description,
    
                    'meta_keywords' => $meta_keywords,
    
                    'meta_description' => $meta_description,
    
                    'alt_tag' => $alt_tag,
    
                    'blog_tags' => $blog_tags
    
                );
                
            }

           else{ $savedata = array(

                'blog_title' => $title,

                "slug" => $slug,

                

                'short_description' => $short_description,

                'description' => $description,

                'meta_keywords' => $meta_keywords,

                'meta_description' => $meta_description,

                'alt_tag' => $alt_tag,

                'blog_tags' => $blog_tags

            );
        }
           
            $result = $this->blogs_model->updateBlog($id,$savedata);

            redirect('blogs');

        }

    }



    

}



