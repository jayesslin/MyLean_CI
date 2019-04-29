<?php
/**
 * Created by PhpStorm.
 * User: 49396
 * Date: 2019/2/13
 * Time: 17:55
 */

Class edition{
    function ImageShrink($imgfile,$minx,$miny){

        //获取大图信息
        $imgarr=getimagesize($imgfile);
        $maxx=$imgarr[0];//宽
        $maxy=$imgarr[1];//长
        $maxt=$imgarr[2];//格式
        $maxm=$imgarr['mime'];//mime类型

        //大图资源
        $maxim=imagecreatefromjpeg($imgfile);

        //缩放判断
        if(($minx/$maxx)>($miny/$maxy)){
            $scale=$miny/$maxy;
        }else{
            $scale=$minx/$maxx;
        }

        //对所求值进行取整
        $minx=floor($maxx*$scale);
        $miny=floor($maxy*$scale);

        //添加小图
        $minim=imagecreatetruecolor($minx,$miny);

        //缩放函数
        imagecopyresampled($minim,$maxim,0,0,0,0,$minx,$miny,$maxx,$maxy);

        //小图输出
        header("content-type:{$maxm}");

        //判断图片类型
        switch($maxt){
            case 1:
                $imgout="imagegif";
                break;
            case 2:
                $imgout="imagejpeg";
                break;
            case 3:
                $imgout="imagepng";
                break;
        }
        //变量函数
        $imgout($minim,$imgfile.'png');


        //释放资源
        imagedestroy($maxim);
        imagedestroy($minim);
    }
}

?>