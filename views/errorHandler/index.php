<br />
<div class="note note-warning">
    <h3>404 - We kunnen de pagina die je opgevraagd hebt niet vinden</h3>
    <p>Ga naar de <a href="<?= URL; ?>dashboard"> beginpagina</a>.</p>
</div>

<?php
$quotes = $this->getParam('quotes');
$random = $quotes[mt_rand(0, count($quotes) - 1)];
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
