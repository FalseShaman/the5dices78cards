<?php
    $content = '<div class="row">
                    <div class="form-group col-md-4">
                        <label for="username" class="form-control">Имя:</label>
                        <input type="text" class="form-control" id="username" autocomplete="off">
                    </div>
                    <div class="col-md-8"></div>
                
                    <div class="form-group col-md-4">
                        <label for="pass" class="form-control">Пароль:</label>
                    </div>
                    <div class="col-md-8"></div>
                    
                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" id="pass" autocomplete="off">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" class="form-control" id="pass_again" autocomplete="off">
                    </div>
                    <div class="col-md-8"></div>
                
                    <div class="form-group col-md-2">
                        <button type="button" class="form-control btn btn-success" id="login" disabled>Войти</button>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="form-control btn btn-info" id="register" disabled>Зарегистрироваться</button>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="form-group col-md-4">
                        <label class="form-control" id="errorLabel" style="color: red; display: none;"></label>
                    </div>
                </div>';
?>