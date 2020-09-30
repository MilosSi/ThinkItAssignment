<?php
    session_start();
    require_once 'app/config/autoload.php';
    require_once 'app/config/database.php';

    $logincontroller= new \app\controllers\logincontroller();
    $shipscontroller= new \app\controllers\shipscontroller();
    $rankscontroller= new \app\controllers\rankscontroller();
    $crewmemberscontroller= new \app\controllers\crewmemberscontroller();
    $notificationcontroller=new \app\controllers\notificationcontroller();
    $userrolescontroller= new \app\controllers\usersrolescontroller();

    if(isset($_GET['page']))
    {
        switch ($_GET['page'])
        {
            case "logreg":
                $logincontroller->index();
                break;
            case "register_logic":
                if($_POST)
                {
                    $data['username']=$_POST['usernameReg'];
                    $data['email']=$_POST['emailReg'];
                    $data['password']=$_POST['passwordReg'];
                    $data['role_id']=$_POST['roleReg'];
                    $logincontroller->register_logic($data);
                }
                break;
            case "login_logic":
                if($_POST)
                {
                    $data['email']=$_POST['emailLogin'];
                    $data['password']=$_POST['passLogin'];
                    $logincontroller->login_logic($data);
                }
                break;
            case "logout":
                $logincontroller->logout();
                break;
            //Ships
            case "ships":
                $shipscontroller->index();
                break;
            case "addship":
                $shipscontroller->show();
                break;
            case "submitaddship":
                $data['ship_name']=$_POST['shipname'];
                $data['serial_num']=$_POST['serialnum'];
                $shipscontroller->store($data);
                break;
            case "editship":
                $shipscontroller->editshow($_GET['id']);
                break;
            case "updateship":
                $data['ship_name']=$_POST['shipname'];
                $data['serial_num']=$_POST['serialnum'];
                $shipscontroller->editstore($data,$_GET['id']);
                break;
            case "deleteship":
                $shipscontroller->delete($_GET['id']);
                break;
            case "ajaxaddcrewmember":
                $shipscontroller->addcrewmember($_POST['id'],$_POST['shipid']);
                break;
            //Ranks
            case "ranks":
                $rankscontroller->index();
                break;
            case "addrank":
                $rankscontroller->show();
                break;
            case "submitaddrank":
                $data['rank_name']=$_POST['rankname'];
                $rankscontroller->store($data);
                break;
            case "editrank":
                $rankscontroller->editshow($_GET['id']);
                break;
            case "updaterank":
                $data['rank_name']=$_POST['rankname'];
                $rankscontroller->editstore($data,$_GET['id']);
                break;
            case "deleterank":
                $rankscontroller->delete($_GET['id']);
                break;
            //crew
            case "crewmembers":
                $crewmemberscontroller->index();
                break;
            case "addcrew":
                $crewmemberscontroller->show();
                break;
            case "submitaddmember":
                $data['first_name']=$_POST['firstname'];
                $data['surname']=$_POST['surname'];
                $data['email_address']=$_POST['email'];
                $data['ship_id']=$_POST['shipid'];
                $dataRanks['ranks']=$_POST['rankid'];
                $crewmemberscontroller->store($data,$dataRanks);
                break;
            case "editcrew":
                $crewmemberscontroller->editshow($_GET['id']);
                break;
            case "updatemember":
                $data['first_name']=$_POST['firstname'];
                $data['surname']=$_POST['surname'];
                $data['email_address']=$_POST['email'];
                $data['ship_id']=$_POST['shipid'];
                $dataRanks['ranks']=$_POST['rankid'];
                $crewmemberscontroller->editstore($data,$dataRanks,$_GET['id']);
                break;
            case "deletecrew":
                $crewmemberscontroller->delete($_GET['id']);
                break;
            //Notifications
            case "notifications":
                $notificationcontroller->index();
                break;
            case "addnotification":
                $notificationcontroller->show();
                break;
            case "ajaxeditorimg":
                $notificationcontroller->addeditorimg();
                break;
            case "submitaddnotification":
                $data['not_name']=$_POST['notname'];
                $data['content']=$_POST['notcontent'];
                $dataRanks['ranks']=$_POST['rankid'];
                $notificationcontroller->store($data,$dataRanks);
                break;
            case "editnotification":
                $notificationcontroller->editshow($_GET['id']);
                break;
            case "updatenotification":
                $data['not_name']=$_POST['notname'];
                $data['content']=$_POST['notcontent'];
                $dataRanks['ranks']=$_POST['rankid'];
                $notificationcontroller->editstore($data,$dataRanks,$_GET['id']);
                break;
            case "deletenotification":
                $notificationcontroller->delete($_GET['id']);
                break;
            //Usersroles
            case "users":
                $userrolescontroller->index();
                break;
            case "addroles":
                $userrolescontroller->show();
                break;
            case "submitaddrole":
                $data['name']=$_POST['rolename'];
                $userrolescontroller->store($data);
                break;
            case "editrole":
                $userrolescontroller->editshow($_GET['id']);
                break;
            case "updaterole":
                $data['name']=$_POST['rolename'];
                $userrolescontroller->editstore($data,$_GET['id']);
                break;
            case "deleterole":
                $userrolescontroller->delete($_GET['id']);
                break;
            case "deleteuser":
                $userrolescontroller->deleteuser($_GET['id']);
                break;
            default:
                $logincontroller->index();
        }

    }
    else
    {
        $logincontroller->index();
    }

?>








