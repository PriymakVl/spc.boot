<?php

namespace app\modules\admin\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\classes\News;


class NewsSearch extends News
{

    public function rules()
    {
        return [
            [['id', 'status', 'user_id'], 'integer'],
            [['title', 'text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 4]]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'user_id' => $this->user_id,
            'status' => self::STATUS_ACTIVE,
        ]);

        return $dataProvider;
    }
}
