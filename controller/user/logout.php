<?php
    session_start();
    // header('Content-type:text/html;charset=utf-8');
    if(isset($_SESSION['user'])){
        session_unset();//free all session variable
        session_destroy();//销毁一个会话中的全部数据
        // setcookie(session_name(),'',time()-3600);
		echo '<script> alert(\'注销成功~~\');location.href=\'../../index.php?action=login\';</script>';
		exit;
    }else{
        echo '<script> alert(\'注销失败，请重新尝试~~\');javascript:history.back(-1);</script>';
		exit;
    }