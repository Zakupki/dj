<?php
/** @var $this HelpController */
/** @var $model Help */
/** @var $models Help[] */
?>
<?php
$this->pageTitle = Yii::t('backend', 'Update "{title}"', array('{title}' => $model->getDisplayTitle()));
$this->breadcrumbs = array(
	Yii::t('backend', 'Helps') => array('admin'),
	Yii::t('backend', 'Update'),
);
?>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
    'legend' => $this->pageTitle,
)); ?>
