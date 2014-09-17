<?php
/* @var $this RaidController */
/* @var $data Raid */

$img = CHtml::image($assetsUrl . $imgFolder . $data->id . '/' . $imgFormat . $data->img, 'image of '.$data->name.' raid', $imgOpt)
?>

<div class="row-fluid">
    <div class="span12 lite-shadow padding10 margin-bottom-20">

<!--        <div>-->
<!--        <b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
<!--        --><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--        </div>-->
        <div class="span5 mobile-margin-bottom-20">
            <?php echo $img; ?>
        </div><!-- /span5 -->

        <div class="span5 mobile-margin-bottom-20">
            <div>
                <span class="label label-info">
                    <?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:
                </span>
                <?php echo CHtml::encode($data->name); ?>
            </div>

            <div>
                <span class="label label-info">
                    <?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:
                </span>
                <?php echo CHtml::encode($data->level); ?>
            </div>

            <div>
                <span class="label label-info">
                    <?php echo CHtml::encode($data->getAttributeLabel('number_of_players')); ?>:
                </span>
                <?php echo CHtml::encode($data->number_of_players); ?>
            </div>

            <div>
                <span class="label label-info">
                    <?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:
                </span>
                <?php echo CHtml::encode($data->type); ?>
            </div>

            <div>
                <span class="label label-info">
                    <?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:
                </span>
                <br>
                <?php echo CHtml::encode($data->description); ?>
            </div>
        </div><!-- /span5 -->

        <div class="span2">
                <a class="btn btn-success" href="<?php echo Yii::app()->createUrl('raid/update', array('id'=>$data->id)); ?>"> <?php echo Yii::t('locale', 'Update'); ?></a>
                <a class="btn btn-danger" href="<?php echo Yii::app()->createUrl('raid/delete', array('id'=>$data->id)); ?>"> <?php echo Yii::t('locale', 'Delete'); ?></a>
        </div>


        <?php /*
        <b><?php echo CHtml::encode($data->getAttributeLabel('is_heroic')); ?>:</b>
        <?php echo CHtml::encode($data->is_heroic); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
        <?php echo CHtml::encode($data->is_active); ?>
        <br />

        */ ?>

    </div><!-- /span12 -->
</div><!-- /row-fluid -->