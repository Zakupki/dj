<?php
/** @var $this UserController */
/** @var $model User */
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
    <div class="row">
        <div class="span6">
            <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span4', 'maxlength' => 64)); ?>
            <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span4', 'maxlength' => 64)); ?>
            <?php echo $form->textFieldRow($model, 'email', array('class' => 'span4', 'maxlength' => 64)); ?>
            <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span4', 'value' => '', 'autocomplete' => 'off')); ?>
            <?php echo $form->textFieldRow($model, 'sort', array('class' => 'span2')); ?>
            <?php /*if($model->type == User::ADMIN) {
    	 echo $form->dropDownListRow($model, 'authItems', User::getRoleList(), array(
            'multiple' => 'multiple',
            'key' => 'name',
        ));
	} */
            ?>
            <?php echo $form->checkBoxRow($model, 'status'); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>