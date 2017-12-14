<?php
session_start();
?>

<html>
<head>
    <title>電卓</title>
</head>
<body>
    <h1>２つのマスに好きな値を入れ、符号を選択してください。</h1>
    <form action = "calc.php" method = "post" >
       <p >
           <input type = "reset" value = "C" >
           <input type = "number" maxlength = "16" name = "text1" required value = "<?php echo $_SESSION['text1']=$_POST['text1']; ?>" >
           <input type = "radio" name = "sigh" value = "+" required > +
           <input type = "radio" name = "sigh" value = "-" required > -
           <input type = "radio" name = "sigh" value = "*" required > ×
           <input type = "radio" name = "sigh" value = "/" required > ÷
           <input type = "number" maxlength = "16" name = "text2" required value = "<?php echo $_SESSION['text2']=$_POST['text2']; ?>" >
           <input type = "submit" value = "=" >
       </p >
     </form >

<?php
    $a=0;
    if(isset($_POST['text1']) && isset($_POST['text2']) && isset($_POST['sigh'])){
        switch($_POST['sigh']){
            case "+":
                echo $a=$_POST['text1']+$_POST['text2'];
                break;
            case "-":
                echo $a=$_POST['text1']-$_POST['text2'];
                break;
            case "*":
                echo $a=$_POST['text1']*$_POST['text2'];
                break;
            case "/":
                if($_POST['text2']=="0"){
                    echo "0入れちゃダメ!!";
                }else{
                    echo $a=$_POST['text1']/$_POST['text2'];
                }
                break;
            }
    }
?>
           <?php $a; ?>
</body>
</html>
