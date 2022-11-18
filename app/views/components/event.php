<h2>
    <?= $element->game ?>
</h2>
<div class="grid-container">
    <div class="grid-item">
        <?= $element->address ?>
    </div>
    <div class="grid-item">
        <?= $element->city ?>
    </div>
    <div class="grid-item">
        <?= $element->date ?>
    </div>
    <div class="grid-item">
        <?= $element->min_players . " / " . $element->max_players ?>
    </div>
    <div class="grid-item">
        <?= $element->description ?>
    </div>
    <div class="grid-item">
        <?= $element->info ?>
    </div>
    <div class="grid-item">
        <?= $element->players ?>
    </div>
</div>