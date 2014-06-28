<table class="table-responsive">
    <? $k = 1;
    for ($i = 0; $i < 3; $i++) {
        ?>
        <tr>
                    <? for ($j = 0; $j < 3; $j++) {?>
          <td><form action ="index.php?page=jeu" method="post">
        <?
        $myCase=$partie->getGrille()->getCase($k);
        echo '<input type="hidden" name="case" value="' . $k. '" />
                       <input type="submit" value="'.(isset($partie)?$partie->getGrille()->getCase($k++)!=""?$myCase->getType():'':'').'" />'; ?>
                    </form></td>
        <? } ?>
        </tr>
<? } ?>
</table>