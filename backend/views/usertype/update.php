<?php
/** @var $this UsertypeController */
/** @var $model Usertype */
/** @var $models Usertype[] */
?>
<?php
$this->pageTitle = Yii::t('backend', 'Update "{title}"', array('{title}' => $model->getDisplayTitle()));
$this->breadcrumbs = array(
	Yii::t('backend', 'Usertypes') => array('admin'),
	Yii::t('backend', 'Update'),
);
?>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
    'legend' => $this->pageTitle,
)); ?>
