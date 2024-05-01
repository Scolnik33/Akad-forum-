<?php 

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\PageService;
use App\Services\PostService;
use App\Services\UserService;

class BaseController extends Controller
{
    public $userService;
    public $postService;
    public $pageService;
    public $commentService;

    public function __construct(UserService $userService, PostService $postService, PageService $pageService, CommentService $commentService)
    {
        $this->userService = $userService;
        $this->postService = $postService;
        $this->pageService = $pageService;
        $this->commentService = $commentService;
    }
}
?>