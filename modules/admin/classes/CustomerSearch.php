<?php

namespace app\modules\admin\classes;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\classes\Customer;


class CustomerSearch extends Customer
{

    public function rules()
    {
        return [
            [['name', 'phone', 'email'], 'string'],
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
        $query = Customer::find()->orderBy(['name' => SORT_ASC]);

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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => self::STATUS_ACTIVE,
        ]);

        return $dataProvider;
    }
}
