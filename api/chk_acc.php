<?php include_once "../base.php";

echo $chk=$Mem->math('count','*',['acc'=>$_POST['acc']]);

// $chk=$Mem->math('count','*',['acc'=>$_POST['acc']]);
// if($chk){
//     echo 1;
// }else{
//     echo 0;
// }