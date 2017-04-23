<?php
/**
 * 文件上传类
 * 改编自thinkphp3.2.3
 */
namespace core\lib;

class Upload
{
	//默认上传配置
	private $config = [
		'mimes'        =>   [],   				//允许上传的mime类型
		'maxSize'      =>   0,    				//上传文件的大小限制(为0不限制)
		'exts'         =>   [],   				//允许上传的文件后缀
		'savePath'     =>   FRAME.'/public',    //文件保存路径
		'saveExt'      =>   '',					//文件保存后缀,空则使用原后缀
 	];

 	//上传错误信息
 	private $errMes = '';


 	/**
	 * 构造函数
	 * @param array $config 上传配置数组
 	 */
 	public function __construct($config = [])
 	{
 		/* 获取配置 */
        $this->config   =   array_merge($this->config, $config);
 	}

 	/**
     * 使用 $this->name 获取配置
     * @param  string $name 配置名称
     * @return multitype    配置值
     */
    public function __get($name) {
        return $this->config[$name];
    }

    public function __set($name,$value){
        if(isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }

    /**
 	 * 上传文件
 	 * @param array $files 文件数组信息,通常为$_FILES
     */
    public function upload($files = '')
    {
    	if('' === $files){
            $files  =   $_FILES;
        }
        if(empty($files)){
            $this->error = '没有上传的文件！';
            return false;
        }
        if (!file_exists($this->config['savePath'])) {
        	mkdir($this->config['savePath'],0777,true);
        }

        $files = $this->dealFiles($files);
        foreach ($files as $key=>$file) {
        	$file['name'] = strip_tags($file['name']);
        	$file['ext']  = pathinfo($file['name'],PATHINFO_EXTENSION);

        	if (!$this->check($file)) {
        		continue;
        	}
        	$fileName = $this->getName($file['ext']);

        	/* 对图像文件进行严格检测 */
            $ext = strtolower($file['ext']);
            if(in_array($ext, array('gif','jpg','jpeg','bmp','png','swf'))) {
                $imginfo = getimagesize($file['tmp_name']);
                if(empty($imginfo) || ($ext == 'gif' && empty($imginfo['bits']))){
                    $this->error = '非法图像文件！';
                    continue;
                }
            }

            if (move_uploaded_file($file['tmp_name'], $this->config['savePath'].'/'.$fileName)){
            	$info[] = $fileName;
            } else {
            	$this->errMes = '上传失败';
            }
        }
        return empty($info) ? false : $info;
    }

    /**
     * 获取最后一次上传错误信息
     * @return string 错误信息
     */
    public function getError(){
        return $this->error;
    }


    /**
     * 对上传文件的数组进行处理
     * @access private
     * @param array $files 上传的文件变量
     * @return array
     */
    private function dealFiles($files)
    {
    	$fileArray = [];
    	foreach ($files as $key=>$file) {
    		if (is_array($file['name'])) {
    			$keys  = array_keys($file);
    			$count = count($file['name']);
    			for ($i = 0; $i < $count; $i++) {
    				foreach ($keys as $value) {
    					$fileArray[$i][$value] = $file[$value][$i];
    				}
    			}
    		} else {
    			$fileArray = $files;
    			break;
    		}
    	}
    	return $fileArray;
    }

    /**
     * 检查上传的文件
     * @param array $file 文件信息
     */
    private function check($file) {
        /* 文件上传失败，捕获错误代码 */
        if ($file['error']) {
            $this->error($file['error']);
            return false;
        }

        /* 无效上传 */
        if (empty($file['name'])){
            $this->errMes = '未知上传错误！';
        }

        /* 检查是否合法上传 */
        if (!is_uploaded_file($file['tmp_name'])) {
            $this->errMes = '非法上传文件！';
            return false;
        }

        /* 检查文件大小 */
        if (!$this->checkSize($file['size'])) {
            $this->errMes = '上传文件大小不符！';
            return false;
        }

        /* 检查文件Mime类型 */
        //TODO:FLASH上传的文件获取到的mime类型都为application/octet-stream
        if (!$this->checkMime($file['type'])) {
            $this->errMes = '上传文件MIME类型不允许！';
            return false;
        }

        /* 检查文件后缀 */
        if (!$this->checkExt($file['ext'])) {
            $this->errMes = '上传文件后缀不允许';
            return false;
        }

        /* 通过检测 */
        return true;
    }

    /**
     * 获取错误代码信息
     * @param string $errorNo  错误号
     */
    private function error($errorNo) {
        switch ($errorNo) {
            case 1:
                $this->error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值！';
                break;
            case 2:
                $this->error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值！';
                break;
            case 3:
                $this->error = '文件只有部分被上传！';
                break;
            case 4:
                $this->error = '没有文件被上传！';
                break;
            case 6:
                $this->error = '找不到临时文件夹！';
                break;
            case 7:
                $this->error = '文件写入失败！';
                break;
            default:
                $this->error = '未知上传错误！';
        }
    }

    /**
     * 检查文件大小是否合法
     * @param integer $size 数据
     */
    private function checkSize($size) {
        return !($size > $this->maxSize) || (0 == $this->maxSize);
    }

    /**
     * 检查上传的文件MIME类型是否合法
     * @param string $mime 数据
     */
    private function checkMime($mime) {
        return empty($this->config['mimes']) ? true : in_array(strtolower($mime), $this->mimes);
    }

    /**
     * 检查上传的文件后缀是否合法
     * @param string $ext 后缀
     */
    private function checkExt($ext) {
        return empty($this->config['exts']) ? true : in_array(strtolower($ext), $this->exts);
    }

    /**
     * 生成唯一的文件名
     * @param string  $ext文件名后缀
     * @return string
     */
    private function getName($ext)
    {
    	$ext = empty($this->config['saveExt']) ?  $ext : $this->config['saveExt'];
    	return empty($ext) ? uniqid(microtime(true),true) : uniqid(microtime(true),true).'.'.$ext;
    }
}
