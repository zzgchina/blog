<?php
/**
 * Created by PhpStorm.
 * User: boo
 * Date: 2018/6/8
 * Time: 17:46
 */

//定义生成接口数据类
class Response
{
    /*
    * 封通信接口数据
    * @param integer $code 状态码
    * @param string $message 状态信息
    * @param array $data 数据
    * return string
    */
    public static function apiResponse($code, $message = '', $data = array() ,$type = '')
    {
        switch ($type) {
            case 'json':
                self::jsonResponse($code, $message, $data);
                break;
            case 'xml':
                self::xmlResponse($code, $message, $data);
                break;
            case 'array':
                echo "<pre>";print_r(self::grantArray($code, $message, $data));exit;
                break;
            default:
                self::jsonResponse($code, $message, $data);
                break;
        }
    }

    /*
    * 封装数为为json数据类型
    * @param integer $code 状态码
    * @param string $message 状态信息
    * @param array $data 数据
    * return string
    */
    public static function jsonResponse($code, $message = '', $data = array())
    {
        $result = self::grantArray($code, $message, $data);
        echo json_encode($result);
        exit;
    }

    /*
    * 封装数为为xml数据类型
    * @param integer $code 状态码
    * @param string $message 状态信息
    * @param array $data 数据
    * return string
    */
    public static function xmlResponse($code, $message = '', $data = array())
    {

        $result = self::grantArray($code, $message, $data);

        header("Content-Type:text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= self::xmlEncode($result);
        $xml .= "</root>";
        echo $xml;
        exit();
    }

    /*
    * 将数组转换为XML格式
    * @param array $array 数组
    * return string
    */
    private static function xmlEncode($array = array())
    {
        $xml = $attr = "";

        if (!empty($array)) {
            foreach ($array as $key => $value) {
                if (is_numeric($key)) {
                    $attr = " id='{$key}'";
                    $key = "item";
                }
                $xml .= "<{$key}{$attr}>";
                $xml .= is_array($value) ? self::xmlEncode($value) : $value;
                $xml .= "</{$key}>\n";
            }
        }
        return $xml;
    }

    /*
    * 按照接口格式生成原数据数组
    * @param integer $code 状态码
    * @param string $message 状态信息
    * @param array $data 数据
    * return array
    */
    private static function grantArray($code, $message = '', $data = array())
    {
        if (!is_numeric($code)) {
            return '';
        }

        $result = array(
            'errCode' => $code,
            'errMsg' => $message,
            'items' => $data
        );

        return $result;
    }
}