<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'project_submit' => [
        [
            'field' => "author",
            'label' => "Nome completo da autora",
            'rules' => "required|trim|min_length[5]",
            'errors' => [
                'required' => "O %s é obrigatório.",
                'min_length' => "O %s informado não parece válido."
            ]
        ],
        [
            'field' => "email",
            'label' => "Endereço de e-mail da autora",
            'rules' => "required|valid_email|trim|strtolower",
            'errors' => [
                'required' => "O %s é obrigatório.",
                'valid_email' => "O %s informado não parece válido."
            ]
        ],
        [
            'field' => "team",
            'label' => "Definição de grupo",
            'rules' => "required|trim",
            'errors' => [
                'required' => "A %s é obrigatória."
            ]
        ],
        [
            'field' => "project_name",
            'label' => "Nome do projeto",
            'rules' => "required|trim",
            'errors' => [
                'required' => "O %s é obrigatório."
            ]
        ],
        [
            'field' => "terms",
            'label' => "Aceite dos termos",
            'rules' => "required",
            'errors' => [
                'required' => "Você precisa concordar com os termos do edital."
            ]
        ],
    ],
    'contact_submit' => [
        [
            'field' => "name",
            'label' => "Nome Completo",
            'rules' => "required|min_length[3]|trim",
            'errors' => [
                'required' => "O %s é obrigatório.",
                'min_length' => "O %s informado não parece válido.",
            ]
        ],
        [
            'field' => "email",
            'label' => "Endereço de E-mail",
            'rules' => "required|valid_email|trim|strtolower",
            'errors' => [
                'required' => "O %s é obrigatório.",
                'valid_email' => "O %s informado não parece válido.",
            ]
        ],
        [
            'field' => "subject",
            'label' => "Motivo do Contato",
            'rules' => "required|min_length[3]|trim",
            'errors' => [
                'required' => "O %s é obrigatório.",
                'min_length' => "O %s informado não parece válido.",
            ]
        ],
        [
            'field' => "message",
            'label' => "Mensagem",
            'rules' => "required|min_length[3]|trim",
            'errors' => [
                'required' => "A %s é obrigatória.",
                'min_length' => "A %s parece curta demais.",
            ]
        ],
    ],
];
