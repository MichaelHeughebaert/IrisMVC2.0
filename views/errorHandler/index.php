<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?= URL; ?>dashboard">Beginpagina</a>
        </li>
        <li>
            <i class="fa fa-circle"></i>
            <span>Systeem</span>
        </li>
    </ul>
</div>
<br />
<div class="note note-warning">
    <h3>404 - We kunnen de pagina die je opgevraagd hebt niet vinden</h3>
    <p>Ga naar de <a href="<?= URL; ?>dashboard"> beginpagina</a>.</p>
</div>

<?php
$random = $this->quotes[mt_rand(0, count($this->quotes) - 1)];
$quote = explode("|", stripslashes($random));
?>

<div class="row">
    <div class="col-md-12">
        <blockquote>
            <p><?php echo $quote[0]; ?></p>
            <small><cite title="Bron"><?php echo $quote[1]; ?></cite></small>
        </blockquote>
    </div>
</div>
