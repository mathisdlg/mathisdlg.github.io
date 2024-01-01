<?php

namespace Controller{
    
    class FrontController{
        public function __construct(){
            global $twig;
            global $basePath;
            
            try{
                $dView['basePath'] = $basePath;
                
                $router = new \AltoRouter();
                $router->setBasePath($basePath);
                
                $router->map('GET|POST', '[/]?', 'CtrlVisitor');
                $router->map('GET|POST', '/[a:action][/]?', 'CtrlVisitor');
                
                
                $match = $router->match();
                if (!$match){
                    $this->error($dView, 404, "Not Found", "The requested URL was not found on this server.");
                }
                else{
                    $dView['match'] = $match;
                    $dView['title'] = "Welcome";
                    
                    switch ($match['target']){
                        case 'CtrlVisitor':
                            $this->callController("CtrlVisitor", $dView);
                            break;
                        default:
                            $this->error($dView, 404, "Not Found", "The requested URL was not found on this server.");
                            break;
                    }
                }
            }catch(\Exception $e){
                $this->error($dView, 500, "Internal server error", $e->getMessage());
            }
        }
        
        private function callController(string $ctrl, array $dView){
            global $twig;
            
            if(isset($dView['match']['params']['action'])){
                $action = $dView['match']['params']['action'];
            }
            else{
                $action = "Welcome";
            }
            
            $controller = "Controller\\" . $ctrl;
            $controller = new $controller();
            
            if (is_callable(array($controller, $action))){
                call_user_func_array(array($controller, $action), array($dView));
            }
            else{
                $this->error($dView, 404, "Not Found", "The requested URL was not found on this server.");
            }
        }
        
        private static function error(array $dView, int $code, string $message, string $desc){
            global $twig;
            
            http_response_code($code);
            $dView['title'] = $code . " " . $message;
            $dView['desc'] = $desc;
            
            echo $twig->render("Common/Error.html", ['dView' => $dView]);
        }
    }
}