<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
                 'loginform' => array(
                                    array(
                                          'field'   => 'password', 
                                          'label'   => 'password', 
                                          'rules'   => 'required|min_length[8]'
                                       ), 
                                    array(
                                          'field'   => 'email', 
                                          'label'   => 'email', 
                                          'rules'   => 'required|valid_email'
                                       ),   
                                    
                                 ),
                 'toevoegen' => array(
                                    array(
                                          'field'   => 'description', 
                                          'label'   => 'description', 
                                          'rules'   => 'required'
                                       ),   
                                 ),
            );