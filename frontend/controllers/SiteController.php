<?php
namespace frontend\controllers;

use app\models\TableProducts;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($search='',$filter='',$type='')
    {
        if ($search!='' & $type!='') {
            $goods = TableProducts::find()->where(['brand'=>$search,'type'=>$type])->orderBy(['products_id' => SORT_DESC]);
        }
        else{
            $goods = TableProducts::find()->orderBy(['products_id' => SORT_DESC]);
        }
        if ($filter !=''){
//                $goods->andFilterWhere(['brand'=>SORT_DESC]);
            if ($filter=='club_kit'){
                $goods->where(['type'=>'club_kit']);
            }
            if ($filter==''){
                $goods->where(['type'=>'club_kit']);
            }
            if ($filter=='cheep') {
                $goods->orderBy(['price'=>SORT_ASC]);
            }
            if ($filter=='expen'){
                $goods->orderBy(['price'=>SORT_DESC]);
            }
            if ($filter=='news'){
                $goods->orderBy(['products_id' => SORT_ASC]);
            }

        }

        $aaa = $goods->all();

        return $this->render('index',[
            'goods'=>$aaa,
            ]);
    }

    public function actionFull($id)
    {
        $full=TableProducts::findOne($id);
        return $this->render('full',[
            'full'=>$full,
        ]);
    }

//    public function actionSearch($name)



}
