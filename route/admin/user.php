<?php
    $dir = "../../";

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_fun($dir, 'fun_admin_auth.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey();
    $auth = $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        switch($io->method){
            case 'edit':
                $form = $io->post;

                if($_FILES['profile_pic']['error'] == 0){
                    $file = new File($dir, 'uploads/profile_pics/');
                    $option = new FileOption();
                    $option->set(
                        TRUE,
                        TRUE,
                        TRUE,
                        "u_",
                        1 * 1000 * 1000,
                        ['jpg', 'jpeg', 'png', 'gif']
                    );
                    $result = $file->upload('profile_pic', $option);
                    if($result->success) $form->profile_pic = $result->response->downloadURL;
                }

                if(isset($form->ID)){
                    $result = FunAdminAuth::edit($api, $form);
                }else{
                    $result = FunAdminAuth::create($api, $form);
                }

                //echo json_encode($result);
                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            case 'delete':
                $id = $io->id;
                $result = FunAdminAuth::delete($api, $id);

                if($result->success) Nav::goto($dir, App::$pageAdminManageUser);
                else ErrorPage::showError($dir, $result);
                break;

            case 'export':
                $result = FunAuth::getFull($api);
                ?>
                    <script id="data"><?php echo json_encode($result) ?></script>
                    <script>
                        exportExcel();
                        async function exportExcel(){
                            var data = await JSON.parse(await document.querySelector('#data').innerHTML);
                            
                            setTimeout(async function(){
                                let auths = await data.response;
                                await exportToCSV(auths);
                            }, 2000);
                            
                        }

                        var objectToCSVRow = function(array) {
                            console.log(array);
                            var str = '';
                        
                            str += 'ID, username, profile_pic, first_name, last_name, birth_date, gender, address, phone, Line id, Facebook, guardian_name, guardian phone, school,' + '\r\n';
                        
                            for (var i = 0; i < array.length; i++) {
                                var line = '';
                            
                                try {
                                    line += array[i]["ID"] + ',';
                                    line += array[i]["username"] + ',';
                                    line += array[i]["profile_pic"] + ',';
                                    line += array[i]["user"]["fname"] + ',';
                                    line += array[i]["user"]["lname"] + ',';
                                    line += array[i]["user"]["bdate"] + ',';
                                    line += array[i]["user"]["gender"] + ',';
                                    line += array[i]["user"]["address"] + ',';
                                    line += array[i]["user"]["phone"] + ',';
                                    line += array[i]["user"]["Line id"] + ',';
                                    line += array[i]["user"]["facebook"] + ',';
                                    line += array[i]["user"]["guardian"] + ',';
                                    line += array[i]["user"]["guardian phone"] + ',';
                                    line += array[i]["user"]["school"] + ',';
                                } catch (error) {
                                    
                                }
                                
                            
                                str += line + '\r\n';
                            }
                        
                            return str;
                        }

                        var exportToCSV = function(array) {
                        
                            var csvContent = "\uFEFF";;
                        
                            // headers
                            csvContent += objectToCSVRow(array);
                        
                            var encodedUri = encodeURIComponent(csvContent);
                            var link = document.createElement("a");
                            link.setAttribute("href", 'data:text/csv; charset=utf-8,' + encodedUri);
                            link.setAttribute("download", "users.csv");
                            document.body.appendChild(link); // Required for FF
                            link.click();
                            document.body.removeChild(link); 
                        }
                    </script>
                <?php
                break;

            default:
                Nav::gotoHome($dir);
                break;
        }   
    }else{
        Nav::gotoHome($dir); 
    }