<?php

    // Bước 01: Kiểm tra giá trị của controller và action
    require_once "../app/Config/config.php";
    require_once "../app/Config/DBConnect.php";
    $controller = isset($_GET['controller'])?$_GET['controller']:'home';
    $action     = isset($_GET['action'])?$_GET['action']:'index';
    // Bước 02: Tìm tệp mà mình sẽ chuyển lại Quyền cho nó (Controller)
    $controller = ucfirst(strtolower($controller)); //Viết hoa chữ cái đầu
    $controller .= 'Controller';
    $controllerPath = APP_ROOT.'/app/Controllers/'.$controller.'.php';
    //Nếu không tồn tại TỆP
    if(!file_exists($controllerPath)){
        die('Tệp tin không tồn tại');
    }
    //Nếu có tồn tại tệp Controller
    require_once($controllerPath);
    // Bước 03: Khởi tạo đối tượng tương ứng của Controller và gọi hàm xử lý Action
    $myObj = new $controller();
    $myObj->$action();

?>