<html>
  <head> <title>hello my php</title>
    <style>
        .error {
            color: #Ffc0cb;
        }
    </style>
  </head>
  <h1>Pop Pop's world</h1>
<title>Pop Pop's world</title>
<body background="https://tse1-mm.cn.bing.net/th/id/OET.3ebe189b5b264088badbe7f006047955?w=272&h=272&c=7&rs=1&o=5&dpr=1.3&pid=1.9">
<p>Hello! welcom to my world.</p>
<ul>
  <li>I don't know I want to say anything......</li>

    <h1><a href="https://www.gushiwen.cn/GuShiWen_0fd00ff1aa.aspx">将进酒</a></h1>

   <a name="hello">君不见，黄河之水天上来，奔流到海不复回。</a><br>
     君不见，高堂明镜悲白发，朝如青丝暮成雪！<br>
     人生得意须尽欢，莫使金樽空对月。<br>
　　天生我材必有用，千金散尽还复来。<br>
　　烹羊宰牛且为乐，会须一饮三百杯。<br>
　　岑夫子，丹丘生，将进酒，杯莫停。<br>
　　与君歌一曲，请君为我倾耳听。<br>
　　钟鼓馔玉不足贵，但愿长醉不复醒。<br>
　　古来圣贤皆寂寞，惟有饮者留其名。<br>
　　陈王昔时宴平乐，斗酒十千恣欢谑。<br>
　　主人何为言少钱，径须沽取对君酌。<br>
　　五花马、千金裘，呼儿将出换美酒，与尔同销万古愁！<br>
     <a href="#hello">up</a><br>
     <hr>
    <a href="index2.html">go to LiTang!</a>
</ul>
  <p><a href="bear.html">bear'home
  </p>
    <?php

$name = $id = $sexsite = "";
$nameerr = $iderr = $sexsiteerr = "";
$password=$passwordEll="";
$passFlag=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameerr = "can't empty";
    } else {
        $name = clear_input($_POST["name"]);
    }

    if (empty($_POST["id"])) {
        $idlerr = "can't empty";
    } else {
        $id = clear_input($_POST["id"]);
    }

    if (empty($_POST["sexsite"])) {
        $sexsiteerr = "can't empty";
    } else {
        $sexsite = clear_input($_POST["sexsite"]);
    }

    if(empty($_POST["password"])){
        $passwordEll="必须输入密码";
    }else{
        $password= clear_input($_POST["password"]);
        if($password=='123456'){
            $passFlag=1;
            $passwordEll="密码正确";
        }else{
            $passwordEll="密码不正确";
        }
    }
}
/*$con = new conn();
if(mysqli_query("$con","create database if no exist")){
    echo "yes";
}else{
}*/
function clear_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<h1>表单提交测试</h1>
<form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
    名字：<input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">* <?php echo "<br> $nameerr"; ?>
        </span>
    <br><br>
    ID：<input type="text" name="id" value="<?php echo $id; ?>">
    <span class="error">*<?php echo "<br> $idlerr"; ?></span>
    <br><br>
    password:<input type="password" name="password" >
    <?php
            echo $passwordEll;
    ?>
    <br><br>
    性别：<input type="text" name="sexsite" value="<?php echo $sexsite ?>">
    <span class="error">*</span>
    <br><br>
    <input type="submit" name="submit" value="提交">

</form>
<p align="center"><table>
    <tr><th >姓名</th> <th>性别</th> <th>id</th>
    </tr>
<?php
$con = mysqli_connect('localhost','root','123456');
if (!$con){
exit('bye');
}
mysqli_select_db($con,'test');
$get=mysqli_query($con, 'select *from test_table ');
echo $name;
if($get){
while($data=mysqli_fetch_array($get)){
echo '<tr><th>';
        echo $data[0];
        echo '</th><th>';
        echo "$data[1]";
        echo '</th><th>';
        echo "$data[2]";
        echo '</th></tr>';
}
}else{
echo mysqli_error($con);
}
?>
</table>
</p>
<?php
error_reporting(0);
/*$sql = 'CREATE DATABASE Qin';
$retval = mysqli_query($con, $sql);*/
$testBatabase = mysqli_select_db($con, test);
$testInsert = mysqli_query($con,
    "insert into `test_table`()value('{$name}','{$id}','{$sexsite}')");

/*mysqli_query("");*/
?>

</body>
</html>

