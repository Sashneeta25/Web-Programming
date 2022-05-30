<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MyGuestBook extends CI_Controller {
 
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('myguestbook_model');
      $this->load->helper('form');
      $this->load->library('form_validation');
    }
 
    public function index() {
      $data['title'] = 'Week 7 Lab Deliverables';
      $this->load->view('mainmenu', $data);
    }

    public function view() {
      $data['result'] = $this->myguestbook_model->read(null, null, null);
      $data['title'] = 'List of All Comments';

      if ($data['result']) {
      $this->load->view('list', $data);
    } else {
      redirect(base_url() . "guestbook");
    }
    }

    public function create() {
      $data['title'] = 'Add Form';
        if ($this->input->post('form-submitted') == "add") {
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $comment = $this->input->post("comment");
  
            $this->form_validation->set_rules("name", "Name", "trim|required");
            $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
            $this->form_validation->set_rules("comment", "Comment", "trim|required");
 
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('form');
            }
            else {
              date_default_timezone_set("Asia/Kuala_Lumpur");
                $postdate = date("Y-m-d",time());
                $posttime = date("H:i:s",time());
      
                $data = array(
                    'user'   => $name,
                    'email'  => $email,
                    'comment' => $comment,
                    'postdate' => $postdate,
                    'posttime' => $posttime
                );
      
                $this->myguestbook_model->create($data);
                $this->view();
            }
        }
        else {
            $this->load->view('form', $data);  
        }
    }

    public function edit() {
      $data['title'] = 'Edit';
        if ($this->input->post('form-submitted') == "edit") {
            $id = $this->uri->segment(3);
            $name = $this->input->post("name");
            $email = $this->input->post("email");
            $comment = $this->input->post("comment");
 
            $this->form_validation->set_rules("name", "Name", "trim|required");
            $this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
            $this->form_validation->set_rules("comment", "Comment", "trim|required");
  
            if ($this->form_validation->run() == FALSE) {
                $data['result'] = $this->myguestbook_model->read(array('id' => $id), null, null);
                $this->load->view('edit', $data);
            }
            else {
                $postdate = date("Y-m-d",time());
                $posttime = date("H:i:s", time());
      
                $data = array(
                    'user'   => $name,
                    'email'  => $email,
                    'comment' => $comment,
                    'postdate' => $postdate,
                    'posttime' => $posttime
                );
      
                $this->myguestbook_model->update($id, $data);
                $this->view();
            }
        }
        else {
            $id = $this->uri->segment(3);
            $data['result'] = $this->myguestbook_model->read(array('id' => $id), null, null);

            if ($data['result']) {
                $data['title'] = ' Editing ' . $id;

                $this->load->view('edit', $data);
            } else {
                redirect(base_url()."myguestbook/view");
            }
        }
    }

    public function remove() {
  
        $id = $this->uri->segment(3);
        $this->myguestbook_model->delete($id);
        $this->view();
    }
}
 
?>
<?php