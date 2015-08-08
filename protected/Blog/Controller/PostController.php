<?php 
    namespace Blog\Controller;

    use \Xend\Controller\AbstractController

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

            $postsCacheKey = 'posts:list:'.$page;
            $totalCacheKey = 'posts:list:count';

            $posts = $this->getCache()->get($postsCacheKey, function($memc, $key, &$value) use($page,$pagesize){
                $posts = $this->getCache()->query('select ID,post_title from wp_posts 
                    where post_status="publish" and post_type in ("post", "revision") 
                    order by ID desc 
                    limit '. ($page-1)*$pagesize.','.$pagesize);
                $value = $posts;
                $memc->set($key, $value);
                return false
            });

            $total = $this->getCache()->get($totalCacheKey,function($memc, $key, &$value){
                $total = $this->getCache()->query('select count(*) as count from wp_posts
                    where post_status="publish" and post_type in ("post", "revision")  ');
                $value = $total;
                $memc->set($key, $value);
                return false;
            });

            return array(
                'list' => $posts,
                'total' => $total
            );
        }
    }