<?php

if (!defined('__ROOT__'))
    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . "/models/MySQLHandler.php");

class ArticleController extends BaseController
{
    public function index()
    {
        $article = new Article;
        $articles = $article->getArticles();
        if ($this->isAdmin() || $this->isEditor()) {
            include __DIR__ . '/../views/articles/index.php';
        } else {
            $_SESSION['error'] = "Sorry, This site can't be reached !!";
            header("Location: /home");
        }
    }

    public function show($id)
    {
        $article = new Article;
        $res = $article->getByID($id);
        include __DIR__ . '/../views/articles/show.php';
    }
    public function create()
    {
        include __DIR__ . '/../views/articles/create.php';
    }

    public function store()
    {
        $article = new Article;

        $_POST["publish_date"] = date('Y-m-d');
        $_POST["user_id"] = $_SESSION['user_id'];
        $ext = substr(strrchr($_FILES['image']['name'], '.'), 1);;
        $new_file_name = date('Y_m_d_H_i_s') . '.' . $ext;
        $target = 'C:/xampp/htdocs/iti/php-project/public/images/articles/';
        move_uploaded_file($_FILES['image']['tmp_name'], $target . $new_file_name);
        $_POST["image"] = $new_file_name;
        $articles = $article->create($_POST);

        header("Location: /articles");
        exit;
    }

    public function destroy($id)
    {
        $article = new Article;
        $delete = $article->delete($id);
        if ($delete) {
            header("Location: /articles");
            exit;
        } else {
            include __DIR__ . '/../views/articles/index.php';
        }
    }
}
