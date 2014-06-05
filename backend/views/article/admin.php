<?php
/** @var $this ArticleController */
/** @var $model Article */
/** @var $form CActiveForm */
?>
<?php
$this->pageTitle = Yii::t('backend', 'Manage');
$this->breadcrumbs = array(
	Yii::t('backend', 'Articles') => array('admin'),
	Yii::t('backend', 'Manage'),
);
?>

<h3><?php echo $this->pageTitle; ?></h3>

<?php $this->beginWidget('TbActiveForm', array(
    'id' => 'admin-form',
    'enableAjaxValidation' => false,
)); ?>

    <?php $this->widget('backend.components.AdminView', array(
        'model' => $model,
        'columns' => array(
            'id',
            'title',
            array(
                'name' => 'user_id',
                'value' => '$data->user ? $data->user->email : null',
                'filter' => CHtml::listData(User::model()->findAll(), 'id', 'email'),
            ),
            array(
                'name' => 'author_id',
                'value' => '$data->author ? $data->author->email : null',
                'filter' => CHtml::listData(User::model()->findAll(), 'id', 'email'),
            ),
            'detail_text',
            'rate',
            'date_create',
            'tags',
            'sort',
            'status',
        ),
    )); ?>

<?php $this->endWidget(); ?>