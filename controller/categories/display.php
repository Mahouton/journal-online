<?php
require_once("../../model/categories.php");
$categories = new Categories();

if(isset($_POST['displaySend'])){
    $content = '';
    $result = $categories->readCategorie();
    foreach ($result as $data) {        
        $id = $data['category_id'];
        $name = $data["name"];
        $icon_name = $data["icon_name"];

        $content.= '<div class="col-md-4"><span class="fa-stack fa-3x"><i class="fa fa-circle fa-stack-2x text-primary"></i>
        
        <i class="fa '.$icon_name.' fa-stack-1x fa-inverse"></i></span>
        <h4 class="section-heading">'.$name.'</h4></div>';
    }
    $content .= '';
    echo $content;
}
?>