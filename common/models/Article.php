<?php
/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $title
 * @property integer $image_id
 * @property integer $user_id
 * @property integer $author_id
 * @property string $detail_text
 * @property integer $rate
 * @property string $date_create
 * @property string $tags
 * @property integer $sort
 * @property integer $status
 *
 * @method Article active
 * @method Article cache($duration = null, $dependency = null, $queryCount = 1)
 * @method Article indexed($column = 'id')
 * @method Article language($lang = null)
 * @method Article select($columns = '*')
 * @method Article limit($limit, $offset = 0)
 * @method Article sort($columns = '')
 *
 * The followings are the available model relations:
 * @property User $user
 * @property File $image
 * @property User $author
 */
class Article extends BaseActiveRecord
{

    public function behaviors()
    {
        return array(
            'attach' => array(
                'class' => 'common.components.FileAttachBehavior',
                'imageAttributes' => array(
                    'image_id'
                ),
                'fileAttributes' => array(
                ),
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
     * @return Article the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
	
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{article}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('title, user_id, date_create', 'required'),
            array('user_id, author_id, rate, sort, status', 'numerical', 'integerOnly' => true),
            array('title, tags', 'length', 'max' => 255),
            array('image_id, detail_text', 'safe'),
            array('image_id', 'file', 'types' => File::getAllowedExtensions(), 'allowEmpty' => true, 'on' => 'upload'),
            array('user_id', 'exist', 'className' => 'User', 'attributeName' => 'id'),
            array('author_id', 'exist', 'className' => 'User', 'attributeName' => 'id'),
            array('id, title, image_id, user_id, author_id, detail_text, rate, date_create, tags, sort, status', 'safe', 'on' => 'search'),
        ));
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'image' => array(self::BELONGS_TO, 'File', 'image_id'),
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => Yii::t('backend', 'Title'),
            'image_id' => Yii::t('backend', 'Image'),
            'user_id' => Yii::t('backend', 'User'),
            'author_id' => Yii::t('backend', 'Author'),
            'detail_text' => Yii::t('backend', 'Detail Text'),
            'rate' => Yii::t('backend', 'Rate'),
            'date_create' => Yii::t('backend', 'Date Create'),
            'tags' => Yii::t('backend', 'Tags'),
            'sort' => Yii::t('backend', 'Sort'),
            'status' => Yii::t('backend', 'Status'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.image_id',$this->image_id);
		$criteria->compare('t.user_id',$this->user_id);
		$criteria->compare('t.author_id',$this->author_id);
		$criteria->compare('t.detail_text',$this->detail_text,true);
		$criteria->compare('t.rate',$this->rate);
		$criteria->compare('t.date_create',$this->date_create,true);
		$criteria->compare('t.tags',$this->tags,true);
		$criteria->compare('t.sort',$this->sort);
		$criteria->compare('t.status',$this->status);

		$criteria->with = array('user', 'author');

        return parent::searchInit($criteria);
    }
}