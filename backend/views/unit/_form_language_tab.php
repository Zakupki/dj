<?php
/** @var $this UnitController */
/** @var $model Unit */
/** @var $form ActiveForm */
/** @var $language string */
?>

<?php echo $form->textFieldRow($model, "[{$language}]title", array('class' => 'span9', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, "[{$language}]title2", array('class' => 'span9', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, "[{$language}]title3", array('class' => 'span9', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, "[{$language}]sort", array('class' => 'span2')); ?>
<?php echo $form->checkBoxRow($model, "[{$language}]status"); ?>
<?php echo $form->hiddenField($model, "[{$language}]language_id", array('value' => $language)); ?>