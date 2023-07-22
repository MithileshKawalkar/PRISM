<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Logs;

/**
 * VoucherworkSearch represents the model behind the search form of `app\models\Voucherwork`.
 */
class LogSearch extends Logs
{
    // public $sent2AOA;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['byUserId', 'time'], 'integer'],
            [['byUserName', 'description'], 'safe'],
        ];
    }


    // public function attributes()
    // {
    //     return array_merge(parent::attributes(), [
    //         'sent2AOA',
    //     ]);
    // }


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
        $query = Logs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'byUserId' => $this->byUserId,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'byUserName', $this->byUserName])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
