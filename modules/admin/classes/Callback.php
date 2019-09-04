<?php

namespace app\modules\admin\classes;

use Yii;
use app\models\ModelBase;

/**
 * This is the model class for table "callbacks".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $created
 * @property int $state
 * @property int $status
 */
class Callback extends ModelBase
{
    const STATE_NOT_CALLBACK = 0;
    const STATE_CALLBACK = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'callbacks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'created' => 'Created',
            'state' => 'State',
            'status' => 'Status',
        ];
    }

    public function add($form)
    {
        $form = (object) $form;
        $this->name = $form->name;
        $this->phone = $form->phone;
        $this->created = time();
        $this->state = self::STATE_NOT_CALLBACK;
        return $this->save();
    }
}
