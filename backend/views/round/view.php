<?php
use yii\helpers\Url;

?>
<div class="panel-group" id="accordion-consultants" role="tablist" aria-multiselectable="false">
    <?php foreach( $consultants as $i => $consultant ):
    $has_round = $consultant->hasRound( $round->id );
    $subs = $consultant->getSubsidiariesArray( $round->id ); 
    if(!$has_round) continue;
    ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading<?=$i?>">
                <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion-consultants" href="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
                    <span class="text-right"><?php echo $consultant->fullName; ?></span>
                    <span class="badge"><?php echo count($subs); ?></span>
                </a>
            </h4>
        </div>
        <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
            <div class="panel-body">
                <div>
                    <?php foreach( $subsidiaries as $subsidiary ): ?>
                        <?php $selected =  (in_array($subsidiary->id, $subs))?true:false; ?>
                        <?php if($selected): ?>
                            <span class="badge"><?php echo $subsidiary->name; ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>