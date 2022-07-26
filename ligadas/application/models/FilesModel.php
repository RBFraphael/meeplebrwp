<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilesModel extends CI_Model
{
    public $file;
    public $error;

    public $table = "ligadas_files";

    public function create($input_name = NULL)
    {
        if(is_string($input_name)){
            $path = "uploads/".date("Y/m");
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }

            $upload_args = [
                'upload_path' => $path,
                'file_ext_tolower' => TRUE,
                'encrypt_name' => TRUE,
                'allowed_types' => "pdf"
            ];

            $this->upload->initialize($upload_args);

            if($this->upload->do_upload($input_name)){
                $upload_data = $this->upload->data();

                $file = [
                    'path' => $path,
                    'filename' => $upload_data['file_name'],
                    'client_name' => $upload_data['orig_name']
                ];

                $this->db->insert($this->table, $file);
                
                if($this->read($file['filename'])){
                    return TRUE;
                }

                $this->error = "ERR_UNKNOWN";
                return FALSE;
            } else {
                $this->error = "ERR_UPLOAD_FAILED_".$this->upload->display_errors();
                return FALSE;
            }
        }

        $this->error = "ERR_MISSING_INPUT_NAME";
        return FALSE;
    }

    public function read($file = NULL)
    {
        if($file != NULL){
            $keys = ['id', 'filename'];

            foreach($keys as $key){
                $query = $this->db->from($this->table)->where([$key => $file])->get()->result_array();
                if(count($query)){
                    $this->file = $query[0];
                    return TRUE;
                }
            }

            $this->error = "ERR_FILE_NOT_FOUND";
            return FALSE;
        }

        $this->error = "ERR_FILE_MISSING";
        return FALSE;
    }

    public function delete($file = NULL)
    {
        if($this->read($file)){
            if(file_exists($this->file['path'])){
                unlink($this->file['path']);
            }
            
            $this->db->delete($this->table, ['id' => $this->file['id']]);
            return TRUE;
        }
        return FALSE;
    }

    public function get_all()
    {
        return $this->db->from($this->table)->get()->result_array();
    }

    public function get_url($file = NULL)
    {
        if($this->read($file)){
            $url = base_url($this->file['path']."/".$this->file['filename']);
            return $url;
        }
        return "";
    }

}
