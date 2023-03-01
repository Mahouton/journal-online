<?php
require_once("../../model/entries.php");


$entries = new Entries();

if (isset($_POST['displaySend'])) {
    $content = '';
    $result = $entries->readEntries();
    foreach ($result as $data) {
        $id = $data['entry_id'];
        $title = $data["title"];
        $body = $data["body"];
        $created_at = $data['created_at'];
        $user_id = $data['user_id'];

        $categorieEntries = $entries->readOneEntries($id);
        foreach ($categorieEntries as $data) {
            $name = $data['name'];
            $icon_name = $data['icon_name'];
        }
        
        $userEntries = $entries->readOneUserEntries($user_id, $id);

        $content .= '
        <div class="col-sm-6 col-md-4 portfolio-item">
            <a class="portfolio-link" href="#portfolioModal'.$id.'" data-bs-toggle="modal">
                <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                        <i class="fa fa-edit fa-2x"></i>
                    </div>
                </div>
                <div> 
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-square fa-stack-2x "></i>
                        <i class="fa '.$icon_name.' fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </a>
            <div class="portfolio-caption">
                <h4>'. $title .'</h4>
                <p class="text-muted">'. $name .'</p>
            </div>
        </div>

        <div class="modal fade text-center portfolio-modal" role="dialog" tabindex="-1" id="portfolioModal'.$id.'">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">'.$title.'</h2>
                                    <div>'.$body.' </div>
                                    <ul class="list-unstyled">
                                        <li>Date: '.$created_at.'</li>
                                        <li>Auteur: '.$userEntries['username'].'</li>
                                        <li>Categorie: '.$name.'</li>
                                    </ul>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">
                                        <i class="fa fa-times"></i><span>&nbsp;Fermer le journal</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }
    $content .= '';
    echo $content;
}
?>