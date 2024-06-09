<?php
namespace Admin\MvcOop\Controllers\Client;

use Admin\MvcOop\Commons\Controller;
use Admin\MvcOop\Models\Post;

class PostController extends Controller
{
    private Post $post;
    public function __construct()
    {
        $this->post = new Post();

    }
    public function show($id)
    {
        $post = $this->post->getById($id);
        // debug($post);
        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
            ]
        );

    }
}
