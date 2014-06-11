<?php
/** @var $this ArticleController */
/** @var $model Article */
/** @var $models Article[] */
/** @var $form ActiveForm */
?>

<?php $form = $this->beginWidget('backend.components.ActiveForm', array(
    'model' => $model,
    'fieldsetLegend' => $legend,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:formAfterValidate',
    ),
)); ?>

    <?php echo $form->textFieldRow($model, 'title', array('class' => 'span9', 'maxlength' => 255)); ?>
    <?php echo $form->fileUploadRow($model, 'image_id', 'image'); ?>
    <?php echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(),'id','email')); ?>
    <?php echo $form->dropDownListRow($model, 'author_id', CHtml::listData(User::model()->findAll(),'id','email')); ?>
    <?php echo $form->textAreaRow($model, 'detail_text', array('rows' => 5, 'cols' => 50, 'class' => 'span9')); ?>
    <?php echo $form->dropDownListRow($model, 'rate', CHtml::listData(array(0=>array('id'=>1,'title'=>1),1=>array('id'=>2,'title'=>2),2=>array('id'=>3,'title'=>3),3=>array('id'=>4,'title'=>4),4=>array('id'=>5,'title'=>5)),'id','title'),array('class' => 'span1')); ?>
    <?php echo $form->textFieldRow($model, 'date_create', array('class' => 'span2')); ?>
    <?php $this->widget('backend.extensions.calendar.SCalendar', array(
        'inputField' => CHtml::activeId($model, 'date_create'),
        'ifFormat' => '%Y-%m-%d %H:%M:%S',
        'showsTime' => true,
        'language' => 'ru-UTF',
    )); ?>
    <?php echo $form->textFieldRow($model, 'tags', array('class' => 'span9', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($model, 'sort', array('class' => 'span2')); ?>
    <?php echo $form->checkBoxRow($model, 'status'); ?>

<?php $this->endWidget(); ?>
