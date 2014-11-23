<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/Insert.css" type="text/css">
</head>

<form name="frm" method="post" enctype="multipart/form-data">
<td class="show">

</td>
<td class="hide">
<font style="letter-spacing:1px" color="#FF0000">上传成功</font><br />
</td>
</form>
<?php
header("Content-Type: text/html; charset=utf-8");
/**
 * @author blog.anchen8.net
 * @copyright 2014
 */
//全局变量
$arrType=array('image/jpg','image/gif','image/png','image/bmp','image/pjpeg');
$max_size='950000';     // byte
$upfile='./image/';     //根目录
    //预览用初始化和站位符检测
    if(!isset($_FILES['upfile'])) 
    echo "没有文件选中";
    else
    $file=$_FILES['upfile'];
    
    //上传方式 POST
    if($_SERVER['REQUEST_METHOD']=='POST'){ //判断提交方式是否为POST
        
        //检测文件夹
        if(!file_exists($path)) 
        { 
            mkdir("$path", 0700);
        }else{
            echo "文件夹已经存在！";
        }
        
        //检测上传文件
        if($file['size']>$max_size){  //判断文件大小是否大于500000字节
            echo "<font color='#FF0000'>上传文件太大！</font>";
            exit;
   } 
    }
    
$id = "1";
$path="image/"."";

?>