<?php

$forderpath = "";
$path = "";
$arrType=array('image/jpeg','image/gif','image/png','image/bmp','image/pjpeg');
$max_size='950000';      // ����ļ����ƣ���λ��byte��


function get_extension($file)
{
    return pathinfo($file, PATHINFO_EXTENSION);
}

        $course_id = mysqli_insert_id($mysqli);
        echo "$course_id";
        $forderpath = './image/'."$course_id";
//ͼƬ�ϴ�
    //�ж��ύ��ʽ�Ƿ�ΪPOST
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
        //����Ƿ���ͼƬ�ϴ�
        if(!is_uploaded_file($course_img['tmp_name']))
        {
            $img_flag .= "û���ϴ�ͼƬ!";
            return;
        }
        //����ļ���״̬
        if(!file_exists($forderpath)) 
        { 
            mkdir("$forderpath",0700);
        }else{
            $img_flag .= "�ļ����Ѿ�����!";
            return;
        }
        //����ļ���С
        if($course_img['size']>$max_size){  //�ж��ļ���С�Ƿ����500000�ֽ�
            $img_flag .= "�ϴ��ļ�����!";
            return;
        }
        if(!in_array($course_img['type'],$arrType)){  //�ж�ͼƬ�ļ��ĸ�ʽ
            $img_flag .= "�ϴ��˲�֧�ֵ�ͼƬ��ʽ";
            return;
        } 
        //�����ļ���
            $fname=$course_img['name'];
            //$ftype=explode('.',$fname);
            $extension = get_extension($fname);
            //echo "$extension";
            $picName=$forderpath."/course_img.".$extension;
        //   
        if(file_exists($picName)){
            $img_flag .="ͬ���ļ��Ѿ�����";
            return;
        }
        if(!move_uploaded_file($course_img['tmp_name'],$picName)){  
            $img_flag .="�ƶ��ļ�ʱ����δ֪�Ĵ�����������ϵ����Ա";
            return;
    }
    }



?>