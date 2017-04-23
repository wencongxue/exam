<?php
namespace app\controller;
use core\lib\Controller;

class PublicController extends Controller
{
    /**
     * 获取科目和题目类型在数据库中对应的id
     * @param  二维数组(也就是从数据库中取出来的时候的数组)  $arr
     * @param  string    $type 科目或题目类型
     * @return int       科目或题目类型id,如果没有,返回0
     */
    public function getId($arr, $type)
    {
        foreach ($arr as $value) {
            $id    = 0;
            foreach ($value as $key=>$_value) {
                if ($key == 'id') $id = $_value;
                if (strtolower($_value) == strtolower($type)) return $id;
            }
        }
        return 0;
    }

    /**
     * 返回二维数组中带有数据库记录id的具有特定键值对的数组
     * 比如,传入一个试题组成的数组,选取出来特定类型的试题数组
     * @param $arr array $arr
     * @param $key mixed $key 特定的键
     * @param $val mixed $val 特定的值
     * @return array
     */
    public function filterArr($arr, $key, $val)
    {
        if (count($arr) == 0) return [];
        foreach ($arr as $_val){
            if ($_val[$key] == $val) {
                $newArr[] = $_val['id'];
            }
        }
        return isset($newArr) ? $newArr : [];
    }

    /**
     * 把试题转化为更易在模板中输出的格式
     * @param aray $ques 初始试题数组
     * @return array 转化后的数组
     */
    private function deal_ques($ques)
    {
        //一个包含26个大写字母的数组
        $upperLetters = [];
        for ($i = 65; $i < 91; $i++)
            $upperLetters[] = chr($i);

        //将所有的试题信息都进行拆分
        foreach ($ques as $key => $val) {
            foreach ($val as $_key => $_val) {
                //将试题信息拆分成数组
                $arr  = explode(SEP, $_val['cont']);

                //数组中第一个存放的就是试题描述
                $ques[$key][$_key]['desc'] = $arr[0];

                //将试题的各个选项存放到数组中
                $ques[$key][$_key]['opts'] = [];
                foreach ($arr as $__key => $__val) {
                    if ($__key == 0) continue;
                    $ques[$key][$_key]['opts'][$upperLetters[$__key - 1]] = mb_substr($__val, 2, NULL, 'UTF-8');
                }
            }
        }

        return $ques;
    }

    /**
     * 获取试题
     * @param string $qIds 试卷表中的qIds字段
     * @param object $model 模型对象
     * @return array 存放三种试题的关联数组
     */
    public function get_ques($qIds,$model)
    {
        $p_info  = explode(SEP, $qIds);
        $sIds    = explode(',', $p_info[0]);         //单选题在题库中的id集合
        $mIds    = explode(',', $p_info[1]);         //多选题在题库中的id集合
        $cIds    = explode(',', $p_info[2]);         //判断题在题库中的id集合
        $ques    = [];
        foreach (['sQues'=>$sIds,'mQues'=>$mIds,'cQues'=>$cIds] as $key=>$val) {
            $ques[$key] = $model->select('question', 
                '*',
                [
                    'id' => $val
                ]
            );
        }

        $ques = $this->deal_ques($ques);

        return $ques;
    }
}
