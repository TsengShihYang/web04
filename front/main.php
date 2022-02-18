<?php
$type=$_GET['type']??0;
if($type==0){
    $nav="全部商品";
    $rows=$Goods->all(['sh'=>1]);
}else{
    $t=$Type->find($type);
    if($t['parent']==0){
        $nav=$t['name'];
    $rows=$Goods->all(['sh'=>1,'big'=>$type]);

    }else{
        $b=$Type->find($t['parent']);
        $nav=$b['name'] .">".$t['name'];
    $rows=$Goods->all(['sh'=>1,'mid'=>$type]);

    }
}

?>
<h1><?=$nav?></h1>
<?php
foreach($rows as $row){
?>
<div class="all" style="display:flex;justify-content:center;height:180px">
    <div class="pp ct" style="padding:10px;width:40%">
    <a href='?do=detail&id=<?=$row['id'];?>'><img src="img/<?=$row['img'];?>" style="width:100%;height:100%"></a>
    </div>
    <div  class="pp" style="width:60%">
        <div class="tt ct" style="padding:5px"><?=$row['name'];?></div>
        <div>價錢:<?=$row['price'];?>
    <a href="?do=buycart&id<?=$row['id'];?>&qt=1" style="float:right"> <img src="icon/0402.jpg"></a>
    </div>
        <div>規格:<?=$row['spec'];?></div>
        <div>簡介:<?=mb_substr($row['intro'],0,15);?>...</div>
    </div>
</div>  
<?php 
}
?>