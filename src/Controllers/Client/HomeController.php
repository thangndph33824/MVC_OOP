<?php
namespace Admin\MvcOop\Controllers\Client;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\Post;

class HomeController extends Controller
{
    private Post $post;
    public function __construct()
    {
        $this->post = new Post();

    }
    public function index()
    {
        $postFirstLatest = $this->post->getLatestLatest();
        $postTopSix = $this->post->
            getTopSix();

        $postTopSixchunk = array_chunk($postTopSix, 3);
        return $this->renderViewClient(
            'home',
            [
                'postFirstLatest' => $postFirstLatest,
                'postTopSixchunk' => $postTopSixchunk
            ]
        );

    }
}
