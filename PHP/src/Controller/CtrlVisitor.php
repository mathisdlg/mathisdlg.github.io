<?php

namespace Controller{
    
    
    class CtrlVisitor{
        
        public function Welcome(array $dView){
            global $twig;
            
            $dView['title'] = "Welcome";
            
            echo $twig->render('WebSite/Welcome/Welcome.html', ['dView' => $dView]);
        }
        
        public function Hobbies(array $dView){
            global $twig;
            
            $dView['title'] = "Hobbies";
            
            echo $twig->render('WebSite/Me/Hobbies.html', ['dView' => $dView]);
        }
    }
}