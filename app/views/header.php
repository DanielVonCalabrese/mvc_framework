<? //session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>MVC</title>
<link rel="stylesheet" href="<?=BASE_URL . 'css/site.css' ?>"></link>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logged">
            <?=isset($_SESSION['user']) ? 'You are logged in as: <strong>' . $_SESSION['user']['username'] . '</strong>(' . $_SESSION['user']['role'] . ')' : 'You are not logged in!' ?>
        </div>
        <div class="menu">
            <a href="<?=$this->helper->myUrl('index', 'index')?>">Home</a>
            <? if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user'): ?>
                <a href="<?=$this->helper->myUrl('edit', 'complains')?>">Add Complain</a>
                <a href="<?=$this->helper->myUrl('index', 'complains')?>">My Complains</a>
                <a href="<?=$this->helper->myUrl('logout', 'index')?>">Logout</a>
            <? elseif(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'developer'): ?>
                <a href="<?=$this->helper->myUrl('viewAll', 'complains')?>">View All Complains</a>
                <a href="<?=$this->helper->myUrl('logout', 'index')?>">Logout</a>
            <? elseif(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a href="<?=$this->helper->myUrl('viewAll', 'complains')?>">View All Complains</a>
                <a href="<?=$this->helper->myUrl('edit', 'products')?>">Add Products</a>
                <a href="<?=$this->helper->myUrl('index', 'products')?>">View Products</a>
                <a href="<?=$this->helper->myUrl('index', 'users')?>">View Users</a>
                <a href="<?=$this->helper->myUrl('logout', 'index')?>">Logout</a>
            <? else: ?>
                <a href="<?=$this->helper->myUrl('login', 'index')?>">Login</a>
                <a href="<?=$this->helper->myUrl('register', 'index')?>">Register</a>
            <? endif; ?>
        </div>
    </div>
    <div class="content">