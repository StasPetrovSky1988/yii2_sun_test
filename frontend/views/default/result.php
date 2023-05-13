<?php

?>

<section>
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h2>Result: </h2>
        <hr>
        <ul>
            <?php foreach ($summary as $k => $v):?>
                <li><b><?= $k?></b> - <?= round($v, 1)?>%</li>
            <?php endforeach;?>
        </ul>
    </div>
</section>
