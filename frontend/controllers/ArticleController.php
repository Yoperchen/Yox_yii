<?php
/**
 * 文章
 * @author Yoper 944975166@qq.com
 * http://www.linglingtang.com
 *
 */
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\logic\ArticleLogic;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ArticleController extends Controller
{
    /**
     * http://yii_advanced_app_2_0_9.me/index.php?r=article/get_article_info&article_id=30
     * 获取信息
     */
    public function actionGet_article_info()
    {
        $condition['id']=Yii::$app->request->get('article_id');
        
        $article_logic=new \common\logic\ArticleLogic();
        $get_article_info_result=$article_logic->get_article_info($condition);
        
        print_r($get_article_info_result);die();
        
    }
    /**
     * 添加
     */
    public function actionAdd_article_info()
    {
        
    }
    /**
     * 获取列表
     */
    public function actionGet_article_list()
    {
        $condition['type']=Yii::$app->request->get('type');//1:公告;2:普通文章;3:论坛贴;4日志;5说说;6:新闻
	    $condition['store_id']=Yii::$app->request->get('store_id');
	    $page_size=Yii::$app->request->get('page_size')?Yii::$app->request->get('page_size'):20;
// 	    print_r($condition);
// 	    die();
	    $article_logic=new \common\logic\ArticleLogic();
	    $get_article_list_result = $article_logic->get_article_list($condition,'*',$page_size);
	    foreach($get_article_list_result['data']['list'] as $article){
	        echo '<br/>'.$article['id'];
	    }print_r($get_article_list_result['data']);die();
    }
    /**
     * 修改
     */
    public function actionUpdate_article()
    {
        
    }
    /**
     * 删除
     */
    public function delete_article()
    {
         
    }
    public function actionTest()
    {
        die('Yoper - test');
    }
}
