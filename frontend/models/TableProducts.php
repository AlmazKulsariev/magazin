<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_products".
 *
 * @property integer $products_id
 * @property string $tittle
 * @property integer $price
 * @property string $brand
 * @property string $seo_words
 * @property string $seo_description
 * @property string $mini_description
 * @property string $image
 * @property string $description
 * @property string $features
 * @property string $datetime
 * @property integer $new
 * @property integer $popular
 * @property integer $sale
 * @property integer $visible
 * @property integer $count
 * @property string $type
 * @property integer $brand_id
 * @property integer $chosen
 */
class TableProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tittle', 'price', 'brand', 'seo_words', 'seo_description', 'mini_description', 'image', 'description', 'features', 'datetime', 'type', 'brand_id'], 'required'],
            [['price', 'new', 'popular', 'sale', 'visible', 'count', 'brand_id', 'chosen'], 'integer'],
            [['seo_words', 'seo_description', 'mini_description', 'description', 'features'], 'string'],
            [['datetime'], 'safe'],
            [['tittle', 'brand', 'type'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'products_id' => 'Products ID',
            'tittle' => 'Tittle',
            'price' => 'Price',
            'brand' => 'Brand',
            'seo_words' => 'Seo Words',
            'seo_description' => 'Seo Description',
            'mini_description' => 'Mini Description',
            'image' => 'Image',
            'description' => 'Description',
            'features' => 'Features',
            'datetime' => 'Datetime',
            'new' => 'New',
            'popular' => 'Popular',
            'sale' => 'Sale',
            'visible' => 'Visible',
            'count' => 'Count',
            'type' => 'Type',
            'brand_id' => 'Brand ID',
            'chosen' => 'Chosen',
        ];
    }
}
