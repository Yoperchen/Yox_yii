<?php
namespace common\logic;

use Yii;
// use yii\base\NotSupportedException;
// use yii\behaviors\TimestampBehavior;
// use yii\web\IdentityInterface;

/**
 * Order Logic
 */
class YoxbaseLogic
{
    const IS_LOG =1;//是否写日志
    public function __construct()
    {
    }
    /**
     * 写日志
     * @param unknown $method
     * @param unknown $data
     * @param string $level
     */
    protected function write_log($method,$log_data,$level='INFO')
    {
        if(self::IS_LOG)
        {
//             Yox_write_log($method,$log_data,$level=\Think\Log::INFO);
        }
    }
    public function test()
    {
        die('Yoper - test');
    }
}
