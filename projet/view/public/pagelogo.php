<?php 
     if(!empty($errors)):?>
    <div class="alert alert-danger ">
        <p>Identifiant ou mot de passe incorrecte</p>
            <ul>
               <?php foreach($errors as $error):?>
                  <li><?=$error; ?></li>
               <?php endforeach?>
            </ul>
    </div>
    <?php endif?>