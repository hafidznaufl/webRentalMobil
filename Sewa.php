<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public function sewa()
    {
        $this->load->view('');
        $this->load->model('sewa_model','sewa');
        
        $_nik = $this->input->post('nik');
        $_nama = $this->input->post('nama');
        $_nopol = $this->input->post('nopol');
        $_merk = $this->input->post('merkid');
        $_warna = $this->input->post('warna');
        $_biaya = $this->input->post('biaya');
        $_tgL_mulai = $this->input->post('tglmulai');
        $_tgL_akhir = $this->input->post('tglakhir');
        $_tujuan = $this->input->post('tujuan');
        $_user_id = $this->session->userdata('id');
        $_mobil_id = $this->input->post('mobil_id');

        $data_sewa[] = $_tgl_mulai;
        $data_sewa[] = $_tgl_akhir;
        $data_sewa[] = $_tujuan;
        $data_sewa[] = $_nik;
        $data_sewa[] = $_user_id;
        $data_sewa[] = $_mobil_id;
        $data_sewa[] = $_nama;
        $data_sewa[] = $_nopol;
        $data_sewa[] = $_merk;
        $data_sewa[] = $_warna;
        $data_sewa[] = $_biaya;
        
        $this->sewa->booking($data_sewa);

        redirect(base_url().'index.php/');
    }
}