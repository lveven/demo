<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/13
 * Time: 20:24
 */
require_once 'dir.func.php';
require_once 'file.func.php';
date_default_timezone_set("Asia/Shanghai");
$path="files";
$info=readDirectory($path);
print_r($info);
?>
<! DOCTYPE html>
<html>
<head lang="zh-CN">
    <meta charset="utf-8">
    <title>Hello,File</title>
    <link rel="stylesheet" href="cikonss.css" />
    <script src="jquery-ui/js/jquery-1.10.2.js"></script>
    <script src="jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    <link rel="stylesheet" href="jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"  type="text/css"/>
    <style type="text/css">
        body,p,div,ul,ol,table,dl,dd,dt{
            margin:0;
            padding: 0;
        }
        a{
            text-decoration: none;
        }
        ul,li{
            list-style: none;
            float: left;
        }
        #top{
            width:100%;
            height:48px;
            margin:0 auto;
            background: #E2E2E2;
        }
        #navi a{
            display: block;
            width:48px;
            height: 48px;
        }
        #main{
            margin:0 auto;
            border:2px solid #ABCDEF;
        }
        .small{
            width:25px;
            height:25px;
            border:0;
        }
    </style>
    <script type="text/javascript">
        function show(dis){
            document.getElementById(dis).style.display="block";
        }
        function delFile(filename,path){
            if(window.confirm("您确定要删除嘛?删除之后无法恢复哟!!!")){
                location.href="index.php?act=delFile&filename="+filename+"&path="+path;
            }
        }
        function delFolder(dirname,path){
            if(window.confirm("您确定要删除嘛?删除之后无法恢复哟!!!")){
                location.href="index.php?act=delFolder&dirname="+dirname+"&path="+path;
            }
        }
        function showDetail(t,filename){
            $("#showImg").attr("src",filename);
            $("#showDetail").dialog({
                height:"auto",
                width: "auto",
                position: {my: "center", at: "center",  collision:"fit"},
                modal:false,//是否模式对话框
                draggable:true,//是否允许拖拽
                resizable:true,//是否允许拖动
                title:t,//对话框标题
                show:"slide",
                hide:"explode"
            });
        }
        function goBack($back){
            location.href="index.php?path="+$back;
        }
    </script>
</head>
<body>
<div id="showDetail"  style="display:none"><img src="" id="showImg" alt=""/></div>
<h1>慕课网-在线文件管理器</h1>
<div id="top">
    <ul id="navi">
        <li><a href="index.php" title="主目录"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-home"></span></span></a></li>
        <li><a href="#"  onclick="show('createFile')" title="新建文件" ><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-file"></span></span></a></li>
        <li><a href="#"  onclick="show('createFolder')" title="新建文件夹"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-folder"></span></span></a></li>
        <li><a href="#" onclick="show('uploadFile')"title="上传文件"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-upload"></span></span></a></li>
        <li><a href="#" title="返回上级目录"><span style="margin-left: 8px; margin-top: 0px; top: 4px;" class="icon icon-small icon-square"><span class="icon-arrowLeft"></span></span></a></li>
    </ul>
</div>

<table width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ABCDEF" align="center">
    <tr>
        <th>编号</th>
        <th>名称</th>
        <th>类型</th>
        <th>大小</th>
        <th>可读</th>
        <th>可写</th>
        <th>可执行</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>访问时间</th>
        <th>操作</th>
    </tr>
    <?php
    if($info['file']){
        $i=1;
        foreach($info['file'] as $val){$p=$path."/".$val;
    ?>
            <tr align="center">
                <td><?php echo $i;?></td>
                <td><?php echo $val;?></td>
               <!-- <td><?php /*echo filetype($path."/".$val)*/?></td>-->
                <td><?php $src=filetype($path."/".$val)=="file"?"file_ico.png":"folder_ico.png";?><img src="images/<?php echo $src?>" alt="" title="文件"></td>
                <td><?php echo transByte(filesize($path."/".$val))?></td>
                <!--<td><?php /*if(is_readable($path."/".$val)) echo "可读"*/?></td>-->
                <td><?php $src=is_readable($path."/".$val)?"correct.png":"error.png";?><img src="images/<?php echo $src?>" height="32px" width="32px"></td>
                <td><?php $src=is_writable($path."/".$val)?"correct.png":"error.png"?><img src="images/<?php echo $src?>" height="32px" width="32px"></td>
                <td><?php $src=is_executable($path."/".$val)?"correct.png":"error.png"?><img src="images/<?php echo $src?>" height="32px" width="32px"></td>
                <td><?php echo date("Y-m-d H:i",filectime($path."/".$val));?></td>
                <td><?php echo date("Y-m-d H:i",filemtime($path."/".$val));?></td>
                <td><?php echo date("Y-m-d H:i",fileatime($path."/".$val));?></td>
                <!--以下为文件操作-->
                <td>
                    <a href="index.php?path=<?php echo $p;?>" ><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
                    <a href="index.php?act=renameFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/rename.png"  alt="" title="重命名"/></a>|
                    <a href="index.php?act=copyFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/copy.png"  alt="" title="复制"/></a>|
                    <a href="index.php?act=cutFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/cut.png"  alt="" title="剪切"/></a>|
                    <a href="#"  onclick="delFolder('<?php echo $p;?>','<?php echo $path;?>')"><img class="small" src="images/delete.png"  alt="" title="删除"/></a>|
                </td>
            </tr>
    <?php
            $i++;
        }
    }
    ?>
</table>
</body>
</html>