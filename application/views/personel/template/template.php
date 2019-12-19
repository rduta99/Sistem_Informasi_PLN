<?php

$this->load->view('personel/template/title', $title);
$this->load->view('personel/template/navbar');
$this->load->view('personel/template/sidebar');
$this->load->view('personel/'.$content);
$this->load->view('personel/template/footer');


?>