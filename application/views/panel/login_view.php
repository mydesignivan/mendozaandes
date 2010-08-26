<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="contlogin">
    <form action="<?=site_url('/panel/login/')?>" method="post" enctype="application/x-www-form-urlencoded">
        <div class="trow">
            <label for="txtUser" class="label-1">Usuario</label>
            <input type="text" name="txtUser" id="txtUser" class="input-login" />
        </div>
        <div class="trow">
            <label for="txtPass" class="label-1">Contrase&ntilde;a</label>
            <input type="text" name="txtPass" id="txtPass" class="input-login" />
        </div>
        <div class="trow align-center"><button type="submit">Entrar</button></div>
    </form>
</div>