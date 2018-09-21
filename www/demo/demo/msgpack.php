<?php

$action = $_GET['action'];

$content = $_POST['content'];
$result = $_POST['result'];


if (!empty($content)) {
    
    if ($action == "unmsg") {

        $content = "��status_code�Ȭexecute_date�2018-08-23 13:50:45�reason_phrase�OK�body��resource��2https://l11-dev-patch-ua3.komoejoy.com/tw/test_cb/�2https://l13-dev-patch-ua3.komoejoy.com/tw/test_cb/�2https://l12-dev-patch-ua3.komoejoy.com/tw/test_cb/�server��!http://10.23.25.246/A3/index.php/�!http://10.23.25.246/A3/index.php/�!http://10.23.25.246/A3/index.php/";
        $result = msgpack_unpack($content);
        vaR_dump($result);

        exit();
        $result = yaml_parse($content);

        


        var_dump(msgpack_unpack( trim( explode("application/x-msgpack", base64_decode($result['peer1_0']))[1])) );
        
        

        // exit();

        // vaR_dump($result);
        // exit(); 




        // $result = msgpack_unpack($content);

        

        // var_dump($content);
        // var_dump($result);
        // var_dump(msgpack_unpack($result));
    }

    if ($action == "msg") {
        $result = msgpack_pack($content);

        

    }


    
}

?>

<body>

<style>
.JsTxtCo {
    width: 548px;
}
.h200 {
    height: 200px;
}   
</style>



<div style="margin-top:100px;width:1200px; margin-left:auto; margin-right:auto;">
    <form method="post" action="?">
        <table>
        <tbody>
            <tr>
                <td>
                    <textarea class="JsTxtCo bor-a1s h200 WrapHid wwlr-l" id="content" name="content" placeholder="处理字符串"><?php echo $content;?></textarea>
                </td>
                <td>
                    <textarea class="JsTxtCo bor-a1s h200 WrapHid wwlr-r" id="result" name="result" placeholder="结果"><?php echo $result;?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                <button type="submit" formaction="?action=unmsg" >解压</button>
                <button type="submit" formaction="?action=msg" >压缩</button>
                </td>
            </tr>
        </tbody>
        </table>
    </form>
</div>

</body>