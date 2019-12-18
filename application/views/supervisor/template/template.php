<?php

$this->load->view('supervisor/template/title', $title);
$this->load->view('supervisor/template/navbar');
$this->load->view('supervisor/template/sidebar');
$this->load->view('supervisor/'.$content);
$this->load->view('supervisor/template/footer');


?>