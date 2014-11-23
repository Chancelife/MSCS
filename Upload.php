<?php

$forderpath = "";
$path = "";
$arrType=array('image/jpeg','image/gif','image/png','image/bmp','image/pjpeg');
$max_size='950000';      // 最大文件限制（单位：byte）


function get_extension($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}

        $course_id = mysqli_insert_id($mysqli);
        echo "$course_id";
        $forderpath = './image/'."$course_id";
//图片上传
    //判断提交方式是否为POST
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
        //检测是否有图片上传
        if(!is_uploaded_file($course_img['tmp_name']))
        {
            $img_flag .= "没有上传图片!";
            return;
        }
        //检测文件夹状态
        if(!file_exists($forderpath)) 
        { 
            mkdir("$forderpath",0700);
        }else{
            $img_flag .= "文件夹已经存在!";
            return;
        }
        //检查文件大小
        if($course_img['size']>$max_size){  //判断文件大小是否大于500000字节
            $img_flag .= "上传文件过大!";
            return;
        }
        if(!in_array($course_img['type'],$arrType)){  //判断图片文件的格式
            $img_flag .= "上传了不支持的图片格式";
            return;
        } 
        //分析文件名
            $fname=$course_img['name'];
            //$ftype=explode('.',$fname);
            $extension = get_extension($fname);
            //echo "$extension";
            $picName=$forderpath."/course_img.".$extension;
        //   
        if(file_exists($picName)){
            $img_flag .="同名文件已经存在";
            return;
        }
        if(!move_uploaded_file($course_img['tmp_name'],$picName)){  
            $img_flag .="移动文件时发生未知的错误，详情请联系管理员";
            return;
    }
    }



?>