<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubmissionsModel extends CI_Model
{
    public $submission;
    public $error;

    public $table = "ligadas_submissions";

    public function create($data = NULL)
    {
        $data = is_null($data) ? $this->input->post() : $data;

        if(is_null($data)){
            $this->error = "NO_DATA_PROVIDED";
            return FALSE;
        }

        /* if($this->read($data['email'])){
            $this->error = "ALREADY_SUBMITED";
            return FALSE;
        } */

        if(!$this->files->create("project_manual")){
            $this->error = "MANUAL_UPLOAD_ERROR";
            return FALSE;
        }
        $manual = $this->files->file['id'];

        if(!$this->files->create("project_printandplay")){
            $this->error = "PRINTANDPLAY_UPLOAD_ERROR";
            return FALSE;
        }
        $printandplay = $this->files->file['id'];

        if(!$this->files->create("project_sellsheet")){
            $this->error = "SELLSHEET_UPLOAD_ERROR";
            return FALSE;
        }
        $sellsheet = $this->files->file['id'];

        $team = $data['team'] == "yes" ? true : false;

        $submission = [
            'author' => $data['author'],
            'email' => $data['email'],
            'team' => $team,
            'co_authors_names' => $team ? serialize($data['co_author_name']) : NULL,
            'co_authors_emails' => $team ? serialize($data['co_author_email']) : NULL,
            'project_name' => $data['project_name'],
            'project_manual' => $manual,
            'project_printandplay' => $printandplay,
            'project_sellsheet' => $sellsheet,
        ];

        $this->db->insert($this->table, $submission);
        if($this->read($data['email'])){
            return TRUE;
        }

        $this->error = "UNKNOWN";
        return FALSE;
    }

    public function read($submission = NULL)
    {
        if($submission == NULL){
            $this->error = "NO_SPECIFIED";
            return FALSE;
        }

        $keys = ['id', 'email'];
        foreach($keys as $key){
            $query = $this->db->from($this->table)->where([$key => $submission])->get()->result_array();
            if(count($query)){
                $this->submission = $query[0];
                return TRUE;
            }
        }

        $this->error = "NOT_FOUND";
        return FALSE;
    }

    public function get_all()
    {
        return $this->db->from($this->table)->get()->result_array();
    }

    public function error_message()
    {
        switch($this->error){
            case "NO_DATA_PROVIDED":
                return "Nenhuma informação recebida.";
                break;
            case "ALREADY_SUBMITED":
                return "Projeto já enviado.";
                break;
            case "MANUAL_UPLOAD_ERROR":
                return "Erro no upload do Manual.";
                break;
            case "PRINTANDPLAY_UPLOAD_ERROR":
                return "Erro no upload do Print and Play.";
                break;
            case "SELLSHEET_UPLOAD_ERROR":
                return "Erro no upload da Folha de Venda.";
                break;
            case "UNKNOWN":
                return "Erro desconhecido.";
                break;
            case "NO_SPECIFIED":
                return "Envio não especificado.";
                break;
            case "NOT_FOUND":
                return "Não encontrado";
                break;
        }
    }
}
