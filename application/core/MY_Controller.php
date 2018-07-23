<?php
/**
 * Created by PhpStorm.
 * User: fz-zzg
 * Date: 2018/6/8
 * Time: 13:39
 */

class MY_Controller extends CI_Controller
{
    public $login_status = FALSE;
    public function __construct()
    {
        parent::__construct();
        if(!$this->is_login()){
            redirect('login/index');
        }
    }



    /**
     * 检查是否登录
     * @return bool
     */
      public function is_login(){

        if(isset($_SESSION['user']) && isset($_SESSION['code'])){
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * 错误页面
     * @param $msg
     * @param int $time
     * @param string $url
     * @return mixed
     */
    public function my_error($msg,$time = 5,$url = '')
    {
        $data['msg'] = $msg;
        $data['time'] = $time;
        $data['url'] = $url;
        return  $this->load->view('errors/self/error',$data);
    }

    /**
     * 成功页面
     * @param $msg
     * @param int $time
     * @param string $url
     * @return mixed
     */
    public function my_success($msg,$time = 5,$url = '')
    {
        $data['msg'] = $msg;
        $data['time'] = $time;
        $data['url'] = $url;
        return  $this->load->view('errors/self/success',$data);
    }

    /**
     * 图片上传
     */
    public function do_upload()
    {
        $config['upload_path']      = './upload/img/'.date('Ymd').'/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10000;
        $config['max_width']        = 2400;
        $config['max_height']       = 2400;
        $config['file_name']       = time();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
          echo json_encode(array('error'=>1,'msg'=>$this->upload->display_errors()));
        }
        else
        {
            echo json_encode(array('errno'=>0,'url'=>'//'.$_SERVER['SERVER_NAME'].$this->upload->data('full_path')));
//            echo '{}';
        }
    }

    /**
     * webupload
     */
    public function webupload(){
//        var_dump(base_url());
//        var_dump($_REQUEST[]);die;

// Make sure file is not cached (as it happens for example on iOS devices)
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");


        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

// 5 minutes execution time
        @set_time_limit(5 * 60);
        $targetDir = './upload/upload_tmp';
        $uploadDir = './upload/img/'.date('Ymd');

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

// Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }
        $fileName = uniqid("file_");
        $suff = '';
// Get a file name
        if (isset($_REQUEST["name"])) {
            $suff = substr($_REQUEST["name"],strrpos($_REQUEST["name"],'.'));
        } elseif (!empty($_FILES)) {
            $suff = substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],'.'));
        }
        $fileName .= $suff;
        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . '/' . $fileName;

// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }

        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

        if($index===$chunks)
        {
            die('{"jsonrpc" : "2.0", "result" : "'.substr($uploadPath,2).'"}');
        }
// Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }
}