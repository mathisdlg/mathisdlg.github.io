<?php

namespace Controller;

class FrontController{
    public function __construct(){
        global $twig;
        global $basePath;
        
        try{
            // $router = new \AltoRouter();     Alto router for later
            // $router->setBasePath($basePath);
            
            $dView['basePath'] = $basePath;
            $dView['title'] = "Welcome";
            $dView['error'] = false;
            
            echo $twig->render("WebSite/Welcome/Welcome.html", ['dView' => $dView]);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}