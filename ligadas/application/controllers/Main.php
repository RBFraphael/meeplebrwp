<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function index()
    {
        if($this->input->post()){
            if($this->input->post("form") == "project-submission"){
                $this->project_submit();
            } else if($this->input->post("form") == "contact-submission"){
                $this->contact_submit();
            }
        }

        $this->load->view("landingpage");
    }

    private function project_submit()
    {
        if($this->form_validation->run("project_submit")){
            if($this->submissions->create()){
                $email_body = $this->load->view("emails/client_confirmation", $this->input->post(), true);

                $confirm = true;
                if(!$this->mailer->send_email($this->input->post("email"), "Confirmação de recebimento", $email_body)){
                    $confirm = false;
                }

                $admin_notif = true;
                $emails = ["midia@meeplebr.com", "mulherestabuleiristas@gmail.com"];
                $email_body = $this->load->view("emails/admin_notification", $this->input->post(), true);
                foreach($emails as $address){
                    if(!$this->mailer->send_email($address, "Contato", $email_body)){
                        $admin_notif = false;
                    }
                }

                if(!$confirm){
                    $this->session->set_flashdata("message", [
                        'type' => "error",
                        'message' => "Ocorreu um erro: ".$this->mailer->error,
                    ]);
                } else if(!$admin_notif){
                    $this->session->set_flashdata("message", [
                        'type' => "error",
                        'message' => "Ocorreu um erro: ".$this->mailer->error,
                    ]);
                } else {
                    $this->session->set_flashdata("message", [
                        'type' => "success",
                        'message' => "Seu projeto foi enviado com sucesso! Verifique sua caixa de entrada para encontrar a confirmação de envio. Boa sorte!"
                    ]);
                }
            } else {
                $this->session->set_flashdata("message", [
                    'type' => "error",
                    'message' => "Ocorreu um erro: ".$this->submissions->error_message(),
                ]);
            }
            redirect("/");
        }
    }

    private function contact_submit()
    {
        if($this->form_validation->run("contact_submit")){
            $body = $this->load->view("emails/contact_email", $this->input->post(), true);

            $emails = ["midia@meeplebr.com", "mulherestabuleiristas@gmail.com"];
            $success = true;

            foreach($emails as $address){
                if(!$this->mailer->send_email($address, "Contato", $body)){
                    $success = false;
                }
            }

            if($success){
                $this->session->set_flashdata("message", [
                    'type' => "success",
                    'message' => "Recebemos sua mensagem com sucesso! Em breve, responderemos no endereço de e-mail ".$this->input->post("email").", portanto fique atento na sua caixa de entrada e caixa de spam. Obrigado!",
                ]);
            } else {
                $this->session->set_flashdata("message", [
                    'type' => "error",
                    'message' => "Ocorreu um erro: ".$this->mailer->error,
                ]);
            }

            redirect("/");
        }
    }

    public function admin()
    {
        if($this->session->userdata("admin")){
            $this->submissions();
        } else {
            $this->login();
        }
    }

    private function login()
    {
        if($password = $this->input->post("login-password")){
            if($password == "!Ligadas@MeepleBR.2021"){
                $this->session->set_userdata("admin", time());
                redirect("admin");
            } else {
                redirect("admin?login=failed");
            }
        }

        $this->load->view("admin/login");
    }

    private function submissions()
    {
        $this->load->view("admin/submissions");
    }

    public function submission($submission_id)
    {
        if(!$this->session->userdata("admin")) redirect("admin");

        if($this->submissions->read($submission_id)){
            $this->load->view("admin/submission", $this->submissions->submission);
        } else {
            redirect("admin");
        }
    }
}