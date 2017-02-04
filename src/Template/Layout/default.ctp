<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.inputmask.js') ?>
    <?= $this->Html->script('script.js') ?>
</head>
<body>
<div class="menuA">
<div class="menu">
    <a href="javascript:history.back();" class="fa fa-chevron-left" style="position: absolute; bottom: 23px;"></a>
    <div class="auth-btns">
        <?php if($loggedIn) : ?>
            <?= $this->Html->link('Log out', ['controller' => 'users', 'action' => 'logout']); ?>
        <?php else : ?>
            <a href="#" type="button" data-toggle="modal" id="forOpen" data-target="#myModal">Log in</a> |
            <a href="#" type="button" data-toggle="modal" data-target="#myModal2">Sign Up</a>
        <?php endif; ?>
    </div>
</div>
</div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row row-signin">
                    <div class="log-form">
                        <p class="fa fa-user" id="login-fa" style=" font-size: 80px;
                                background: #9dc3ff;
                                padding: 7px 18px 10px;
                                border-radius: 100em;
                                text-align: center;
                                color: #4c7ee7;
                                margin-left: 50%;
                                transform: translateX(-50%) !important;"></p>
                        <?= $this->Form->create('Users', [
                            'url' => ['controller' => 'Users', 'action' => 'login']
                        ]); ?>
                        <?= $this->Form->input('email', array('type' => 'email', 'class' => 'form-control', 'placeholder' => 'E-mail')); ?>
                        <?= $this->Form->input('password', array('type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')); ?>
                        <?= $this->Form->submit('Log in', array('class' => 'login-btn btn btn-primary', 'id' => 'login-btn', 'style' => 'padding: 0')); ?>
                        <p style="text-align:center">Don't have an account?<a href="#" data-toggle="modal" data-target="#myModal2" data-dismiss="modal"> Sign up</a></p>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row row-signin">
                    <div class="log-form">
                        <form method="post" accept-charset="utf-8" action="/untitled1/users/register">
                            <label for="name">What is your full name?
                                <input type="text" class="form-control" placeholder="Ivanov Ivan" id="name-sign" name="name">
                                <p class="fail fail-name"></p>
                            </label>
                            <label for="login">Login
                                <input type="text" class="form-control" placeholder="Login" id="login-sign" name="login">
                                <p class="fail fail-login"></p>
                            </label>
                            <label for="email">Email
                                <input type="email" class="form-control" placeholder="E-mail" id="email-sign" name="email">
                                <p class="fail fail-email"></p>
                            </label>
                            <label for="phone">Phone
                                <input type="text" class="form-control" id="phone-sign" name="phone">
                                <p class="fail fail-phone"></p>
                            </label>
                            <label for="password">Password
                                <input type="password" class="form-control" placeholder="Password" id="password-sign" name="password">
                                <p class="fail fail-pass"></p>
                            </label>
                            <label for="password2">Repeat password
                                <input type="password" class="form-control" placeholder="Repeat password" id="password2-sign" name="password2">
                                <p class="fail fail-pass2"></p>
                            </label>

                            <button type="submit" id="sign-btn" class="login-btn btn btn-primary">Sign up</button>
                            <p style="text-align:center">Already have an account?<a href="#" data-toggle="modal" data-target="#myModal" data-dismiss="modal"> Log in</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
