<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_cuti');
    }
    public function surat_cuti_pdf($id_cuti){

        $data['cuti'] = $this->m_cuti->get_all_cuti_by_id_cuti($id_cuti)->result_array();

       
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('Letter', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "surat-cuti.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }
    public function surat_pembayaran($id_cuti){
        $data['cuti'] = $this->m_cuti->get_all_cuti_by_id_cuti($id_cuti)->result_array();
        
        $this->load->library('pdf');
        
        // Set paper size to 80mm x 200mm (ukuran slip kwitansi)
        $this->pdf->setPaper('A4', 'portrait'); 
    
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true);
        
        $this->pdf->filename = "surat-pembayaran.pdf";
        $this->pdf->load_view('pembayaran_pdf', $data);
    }
    
}