<?php
/**
 * Created by PhpStorm.
 * User: rcol4
 * Date: 8/26/2016
 * Time: 11:37 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php bloginfo ('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
    <div id="main-header" class="jumbotron">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-lg-1 hidden-xs hidden-sm"><a href="<?php echo home_url(); ?>"><img style="height:200px;width:auto;" src="<?php echo get_template_directory_uri(); ?>/img/Pied-Piper.gif" ></a></div>
                <div class="col-md-10 col-lg-8"><h1>Hamlin Chamber of Commerce</h1>
                    <h2>Home of the Hamlin Pied Pipers</h2>
                </div>
                <div class="col-md-12 col-lg-3">
                    <nav>
                        <ul id="action-nav" class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo get_permalink( get_page_by_title( 'Join the Chamber!' ) ) ?>"><span class="glyphicon glyphicon-circle-arrow-right"></span> Join the Hamlin Chamber!</a> </li>
                            <li><a href="<?php echo get_permalink( get_page_by_title( 'Hamlin Marquee' ) ) ?>"><span class="glyphicon glyphicon-circle-arrow-right"></span> Put your message on the sign!</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   <nav id="main-nav" style="margin-bottom:0px" class="navbar navbar-inverse">
       <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 hidden-xs hidden-sm hidden-md">
                    &nbsp;
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                     </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Our Town <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo get_permalink( get_page_by_title( 'Hamlin Introduction' ) ) ?>">Introduction</a></li>
                                    <li><a href="<?php echo get_post_type_archive_link( 'businesses' ); ?>">Businesses</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Our Chamber <span class="caret"></span></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo get_permalink( get_page_by_title( 'Chamber Leadership' ) ) ?>">Leadership</a></li>
                                    <li><a href="<?php echo get_permalink( get_page_by_title( 'Member Businesses' ) ) ?>">Member Businesses</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo get_permalink( get_page_by_title( 'All Games' ) ) ?>">Our Sports</a> </li>
                            <li><a href="<?php echo get_permalink( get_page_by_title( 'All Events' ) ) ?>">Our Events</a></li>
                            <li><a href="<?php echo get_permalink( get_page_by_title( 'All News' ) ) ?>">Our News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-1">
                    <ul class="nav navbar-nav">
                        <li><?php wp_loginout(); ?></li>
                    </ul>
                </div>
                <div class="col-md-8 col-lg-2">
                    <form class="form-inline" role="form" style="padding-top:10px;">
                        <?php get_search_form(); ?>
                        <!--<div class="form-group">
                            <label for="search_text" class="sr-only">Search For</label>
                            <input type="text" class="form-control" id="search_text" placeholder="Search Words Here"/>
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>-->

                    </form>
                </div>
            </div>
       </div>

   </nav>