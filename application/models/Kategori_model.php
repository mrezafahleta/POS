<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends MY_Model
{
    public function getDefaultValues()
    {
        return [
            'id'   => '',
            'title' => '',

        ];
    }

    public function getValidationRules()
    {
        $pesan = [
            'required' => 'Field tidak boleh kosong'
        ];

        $validationRules = [
            [
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ], $pesan
        ];

        return $validationRules;
    }
}

/* End of file Kategori_model.php */
