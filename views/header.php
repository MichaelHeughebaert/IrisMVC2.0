<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $this->getTitle(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Politiezone Oostende intranet" name="description"/>
    <meta content="Dienst ICT" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="/public/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/public/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/public/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="/public/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="/public/global/css/components.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="/public/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/global/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="/public/global/css/themes/darkblue.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="/public/global/css/custom.min.css" rel="stylesheet" type="text/css"/>

    <?php if ($this->getParam('scripts', 'login')) { ?>
        <link href="/public/pages/css/login-2.min.css" rel="stylesheet" type="text/css"/>
    <?php } ?>

    <link rel="shortcut icon" href="/public/global/img/favicon.ico"/>
</head>
<?php if ($this->getParam('scripts', 'login')) { ?>
<body class="login">
<div class="logo">
    <img src="/public/global/img/logo-big-white.png" style="height: 17px;" alt="intranet logo"/>
</div>
<div class="content">
    <?php } else { ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="dashboard"><img src="/public/global/img/logo.png" alt="logo"
                                     class="logo-default"/></a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
    </div>
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
       data-target=".navbar-collapse"> </a>
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown dropdown-user">

            </li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler"></div>
                </li>
                <li class="sidebar-search-wrapper">
                    <form class="sidebar-search  sidebar-search-bordered" method="POST">
                        <a href="javascript:;" class="remove"><i class="icon-close"></i></a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item start ">
                </li>
            </ul>
        </div>
    </div>

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <?= $this->renderBreadcrumbs(); ?>
                </ul>
            </div>
<?php } ?>