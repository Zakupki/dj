<?php
/** @var $this PurchaseController */
/** @var $model Purchase */
/** @var $models Purchase[] */
?>
<?php
$this->pageTitle = Yii::t('backend', 'Clone "{title}"', array('{title}' => $model->getDisplayTitle()));
$this->breadcrumbs = array(
	Yii::t('backend', 'Purchases') => array('admin'),
	Yii::t('backend', 'Clone'),
);
?>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
    'legend' => $this->pageTitle,
)); ?>
