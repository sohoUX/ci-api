<?php
use yii\helpers\Url;

?>

<form id="round-consultant-form" action="<?php echo Url::to(['round/modal', 'round_id' => $round->id]); ?>">
    <?php if($alert): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span>Los consultores han sido guardados exitosamente!</span>
        </div>
    <?php endif; ?>
    <div class="panel-group" id="accordion-consultants" role="tablist" aria-multiselectable="false">
        <?php foreach( $consultants as $i => $consultant ): ?>
        <?php $has_round = $consultant->hasRound( $round->id ); ?>
        <?php $subs = $consultant->getSubsidiariesArray( $round->id ); ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$i?>">
                    <h4 class="panel-title">
                    <span><input type="checkbox" name="consultant[<?=$consultant->id?>][enable]"
                        <?php echo ($has_round)?'checked':''; ?> /></span>
                    <a role="button" data-toggle="collapse" data-parent="#accordion-consultants" href="#collapse<?=$i?>" aria-expanded="false" aria-controls="collapse<?=$i?>">
                        <span class="text-right"><?php echo $consultant->fullName; ?></span>
                        <span class="badge"><?php echo count($subs); ?></span>
                    </a>
                </h4>
            </div>
            <div id="collapse<?=$i?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$i?>">
                <div class="panel-body">
                    <select name="consultant[<?=$consultant->id?>][subsidiaries][]" style="width: 98%;" multiple data-select>
                        <?php foreach( $subsidiaries as $subsidiary ): ?>
                            <?php $selected =  (in_array($subsidiary->id, $subs))?'selected':''; ?>
                            <option value="<?php echo $subsidiary->id; ?>" <?php echo $selected; ?>>
                                <?php echo $subsidiary->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</form>