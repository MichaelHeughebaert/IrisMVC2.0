<form class="login-form" action="<?= URL; ?>authentication/login" method="post">
    <div class="form-title">
        <span class="form-title">Welkom</span>
        <span class="form-subtitle">Gelieve u aan te melden</span>
    </div>
    <?php
    if ($this->getParam('errors', 'Gebruikersnaam') || $this->getParam('errors', 'Wachtwoord')) {
        echo '<div class="alert alert-danger display-hide" style="display: block">';
        echo 'Gebruikersnaam en/of wachtwoord is verkeerd';
        echo '</div>';
    }
    ?>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Gebruikersnaam</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
               placeholder="Gebruikersnaam" name="Gebruikersnaam" autofocus/></div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Wachtwoord</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
               placeholder="Wachtwoord" name="Wachtwoord"/></div>
    <div class="form-actions">
        <button type="submit" class="btn red btn-block uppercase">Aanmelden</button>
    </div>
</form>