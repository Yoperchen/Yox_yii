<?php
/**
 * 文章
 * @author Yoper 944975166@qq.com
 * http://www.linglingtang.com
 *
 */
namespace common\logic;

use Yii;
use common\logic\YoxbaseLogic;
// use yii\base\NotSupportedException;
// use yii\behaviors\TimestampBehavior;
// use yii\web\IdentityInterface;

/**
 * Order Logic
 */
class ArticleLogic extends YoxbaseLogic
{
    const ANNOUNCEMENT=1;//公告
    const ARTICLE     =2;//普通文章
    const POSTS		  =3;//帖子
    const DIARY		  =4;//日志
    const SAYSAY	  =5;//说说
    const IS_LOG      =1;//是否写日志
    private $article_model=null;
    public function __construct()
    {
        parent::__construct();
        $this->article_model=new \common\models\Article();
    }
    /**
     * 获取用户信息
     * @param array $condition
     * @return multitype:number unknown
     */
    public function get_article_info($condition,$fields='*')
    {
        $result = array('status'=>0);
        if(empty($condition)||!is_array($condition))
        {
            $result['message']='条件错误';
            return $result;
        }
        
        $get_article_info_result = $this->article_model->get_article_info($condition,$fields);
        if($get_article_info_result['status']<1)
        {
            $result['message']=$get_article_info_result['message'];
            return $result;
        }
//隐私权限检查
//         $PrivacyLogic = new \Common\Logic\PrivacyLogic();
//         $check_privacy_result = $PrivacyLogic->check_privacy($get_article_result['data']['user_id'],session('id'),'article'.$get_article_result['data']['id']);
//         if($check_privacy_result['status']<1)
    //         {
    //             $article_info['content']=$check_privacy_result['message'];
    //             $result['message']=$check_privacy_result['message'];
    //             $result['data']=$article_info;
    //             return $result;
    //         }
//访问量+1
        $update_data = array('view'=>$get_article_info_result['data']['view']+1);
//         $this->update_article($condition,$update_data);
        
        $result['status']=1;
        $result['data']=$get_article_info_result['data'];
        //         $this->write_log(__METHOD__,$result);
        return $result;
    }
    public function add_article_info($article_data)
    {
        
    }
    /**
     * 获取用户列表
     * @param array $condition
     * @param number $page_size
     */
    public function get_article_list($condition,$fields,$page_size=20)
    {
        $result = array('status'=>0);
        if(!empty($condition['user_id'])&&!is_numeric($condition['user_id']))
        {
            $result['message']='user_id 错误';
            return $result;
        }
        $get_article_list_result = $this->article_model->get_article_list($condition,$fields,$page_size);
        //隐私设置
        //         $Privacy_model = D('Privacy');
        //         $mark_result = $Privacy_model->mark_content_list_privacy($prefix='article',$get_article_list_result['data']);
        //         $get_article_list_result['data']['list'] = $mark_result['data']['list'];
        
        if($get_article_list_result['status']<1)
        {
            $result['message']=$get_article_list_result['message'];
            return $result;
        }
        
        $result['status']=1;
        $result['data']=$get_article_list_result['data'];
        return $result;
    }
    /**
     * 修改用户
     * @param array $condition
     * @param array $article_data
     * @return multitype:number string unknown
     */
    public function update_article($condition,$article_data)
    {
        
    }

    public function test()
    {
        die('Yoper - test');
    }
}
