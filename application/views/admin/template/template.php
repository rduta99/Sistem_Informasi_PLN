<?php

$this->load->view('admin/template/title', $title);
$this->load->view('admin/template/navbar');
$this->load->view('admin/template/sidebar');
$this->load->view('admin/'.$content);
$this->load->view('admin/template/footer');


?>