<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends MY_Model
{
    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'email'     => '',
            'password'  => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'email',
                'label'     => 'Email',
                'rules'     => 'trim|required|valid_email'
            ],
            [
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'trim|required'
            ],


        ];

        return $validationRules;
    }

    public function run($input)
    {
        // Pengecekan keberadaan email
        $result = $this->where('email', strtolower($input->email))->first();

        if (empty($result)) {
            throw new Exception('Email kamu tidak ditemukan');
        }


        $result = $this->where('email', strtolower($input->email))
            ->where('is_active', 1)
            ->first();
        if (empty($result)) {
            throw new Exception('Email kamu belum diaktifkan, hubungi administrator');
        }
        if (!empty($result) &&  hashEncryptVerify($input->password, $result->password)) {
            $sess_data = [
                'id'       => $result->id,
                'name'     => $result->name,
                'email'    => $result->email,
                'role'     => $result->role,
                'is_login' => true
            ];

            $this->session->set_userdata($sess_data);
            return true;
        } else {
            throw new Exception('Password Salah');
        }
    }
}
    
    /* End of file Login_model.php */
