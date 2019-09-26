<?php

namespace app\modules\order\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\order\classes\Order;

class OrderSearch extends Order
{

    public function rules()
    {
        return [
            [['id', 'status', 'state', 'id_customer'], 'integer'],
            [['registered'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find()->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider(['query' => $query, 'pagination' => ['pageSize' => 10]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            // return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'state' => $this->state,
            'status' => self::STATUS_ACTIVE,
            'id_customer' => $this->id_customer,
        ]);

        // $query->andFilterWhere(['like', 'registered', $this->registered]);
        return $dataProvider;
    }
}
