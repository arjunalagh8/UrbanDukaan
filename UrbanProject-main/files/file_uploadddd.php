<?php
require_once 'connect.php';
if(isset($_POST['submit'])){
                        if(isset($_FILES['file'])){
                          $file = $_FILES['file'];
                          // file properties
                          $file_name = $file['name'];
                          $file_tmp = $file['tmp_name'];
                          $file_size = $file['size'];
                          $file_error = $file['error'];
                          //work  out the extention
                          $file_ext = explode('.', $file_name);
                          $file_ext = strtolower(end($file_ext));

                          $allowed = array('jpg', 'png', 'jpeg', 'gif');
                          if(in_array($file_ext,$allowed)) {
                            if($file_error === 0){
								//define('MB', 1048576);
                              if($file_size <= 2000000) {
                               $file_name_new = $file_name . '.' . $file_ext;
                               $file_destination = 'uploads' . $file_name_new;
                               if (move_uploaded_file($file_tmp,$file_destination)){
                                
                                  echo "<h3 class='bg-success text-center p-3'>You have successfully uploaded your C.V.</h3>";

                               }
                              }
                              else {
                                echo "error size";
                              }
                            }
                          }
                          else {
                            echo "<h3 class='text-center bg-warning p-3'>Attach a file/correct file first.</h3>";
                          }
                        }
                        else {

                        }
                      }