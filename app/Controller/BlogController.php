<?php

namespace App\Controller;


use App\Service\Form;
use App\Weblitzer\Model;
use App\Service\Validation;
use App\Weblitzer\Controller;

class BlogController extends Controller
{

    public function listing()
    {
        $blogs = Model::all();
        $this->render('app.blog.listing', ['articles' => $blogs]);
    }
    public function show($id)
    {
        $article = $this->isArticleExistOr404($id);

        $this->render('app.blog.show', ['article' => $article]);
    }

    public function add()
    {
        $errors = [];

        if (!empty($_POST['submitted'])) :
            $post = $this->cleanXss($_POST);
            $validation = new Validation;
            $errors = $this->validBlog($errors, $validation, $post);
            
            if ($validation->IsValid($errors)) :
                Model::insert($post);
                $this->redirect('blog');
            endif;
       
        endif;
        $form = new Form();
        $this->render('app.blog.add', ['form' => $form]);
        
    }

    public function validBlog($errors, $validation, $post)
    {
        $errors['titre'] = $validation->textValid($post['titre'], 'titre', 20, 255);
        $errors['contenu'] = $validation->textValid($post['contenu'], 'contenu', 200, 2000);
        $errors['image_url'] = $validation->textValid($post['image_url'], 'image_url', 20, 500);
        return $errors;
    }





    public function isArticleExistOr404($id)
    {
        $article = Model::findById($id, 'id_article');
        if (empty($article)) :
            $this->Abort404();
        endif;
        return $article;
    }
}
