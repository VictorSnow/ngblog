<?php 
    namespace Blog\Controller;

    class PostController {

        public function detailAction($routeinfo){
            $id = $routeinfo['index'];

            $pdo = \Xend\Application::getInstant()->db;
            $post = $pdo->query('select * from wp_posts
                                    where post_status="publish" and ID=:ID',array(':ID'=>$id));
            return array(
                'post' => $post[0]
            );
        }

        public function listAction($routeinfo){
            $pdo = \Xend\Application::getInstant()->db;

            $page = 1;
            $pagesize = 10;
            if(isset($routeinfo['index'])){
                $page = intval($routeinfo['index']);
            }

            $total = $pdo->query('select count(*) as count from wp_posts
                                    where post_status="publish" and post_type in ("post", "revision")  ');

            $posts = $pdo->query('select ID,post_title from wp_posts 
                                    where post_status="publish" and post_type in ("post", "revision") 
                                    order by ID desc 
                                    limit '. ($page-1)*$pagesize.','.$pagesize);

            return array(
                'list' => $posts,
                'total' => $total[0]['count']
            );
        }
    }