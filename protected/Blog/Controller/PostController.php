<?php 
    namespace Blog\Controller;

    use \Xend\Controller\AbstractController;

    class PostController extends AbstractController{

        public function detailAction($routeinfo){
            $id = $routeinfo['index'];

            $post = $this->getDb()->query('select * from wp_posts
                                    where post_status="publish" and ID=:ID',array(':ID'=>$id));
            return array(
                'post' => $post[0]
            );
        }

        public function listAction($routeinfo){
            
            $page = 1;
            $pagesize = 10;
            if(isset($routeinfo['index'])){
                $page = intval($routeinfo['index']);
            }

           
            $posts = $this->getDb()->query('select ID,post_title from wp_posts 
                where post_status="publish" and post_type in ("post", "revision") 
                order by ID desc 
                limit '. ($page-1)*$pagesize.','.$pagesize);
           
	   $total = $this->getDb()->query('select count(*) as count from wp_posts
                where post_status="publish" and post_type in ("post", "revision")  ');
           
            return array(
                'list' => $posts,
                'total' => $total[0]['count']
            );
        }
    }
