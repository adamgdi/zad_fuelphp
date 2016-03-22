<?php


class Controller_Posts extends \Controller_Template {

    function action_index() {
        $posts = \Model_Post::find('all');

        $view  = \View::forge('listing');
        $view->set('posts', $posts, false);

        $this->template->content = $view;
    }


    function action_add() {


        $fieldset = Fieldset::forge()->add_model('Model_Post');
        $form     = $fieldset->form();
        $form->add('submit', '', array('type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary'));

        if($fieldset->validation()->run() == true)
        {
            $fields = $fieldset->validated();

            $post = new Model_Post;
            $post->post_title     = $fields['post_title'];
            $post->post_content   = $fields['post_content'];
            $post->author_name    = $fields['author_name'];
            $post->author_email   = $fields['author_email'];
            $post->author_website = $fields['author_website'];
            $post->post_status    = $fields['post_status'];

            if($post->save())
            {
                \Response::redirect('posts/edit/'.$post->id);
            }
        }

        $this->template->set('content', $form->build(), false); 
    }

        //edit
    function action_edit($id) {
        $post = \Model_Post::find($id);

        $fieldset = Fieldset::forge()->add_model('Model_Post')->populate($post);
        $form     = $fieldset->form();
        $form->add('submit', '', array('type' => 'submit', 'value' => 'Save', 'class' => 'btn medium primary'));

        if($fieldset->validation()->run() == true)
        {
            $fields = $fieldset->validated();

            $post->post_title     = $fields['post_title'];
            $post->post_content   = $fields['post_content'];
            $post->author_name    = $fields['author_name'];
            $post->author_email   = $fields['author_email'];
            $post->author_website = $fields['author_website'];
            $post->post_status    = $fields['post_status'];

            if($post->save())
            {
                \Response::redirect('posts/edit/'.$id);
            }
        }

        $this->template->set('content', $form->build(), false); 
    }
}
