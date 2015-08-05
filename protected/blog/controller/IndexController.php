<?php 
    namespace Blog\Controller;

    class IndexController {
        public function indexAction()
        {
            return;
        }

        public function listAction(){
            return array(
                'list' => array(),
                'total' => 10
            );
        }
    }