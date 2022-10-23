<?php

namespace Adue\WordPressBasePlugin\Modules\Registers\Comments;

use Adue\WordPressBasePlugin\Helpers\Traits\UseLoader;

class BaseCommentMeta
{
    protected $key = '';
    protected $needLogin = 'both'; //Posible values: yes, no, both

    use UseLoader;

    public function register()
    {
        if($this->needLogin == 'yes' || $this->needLogin == 'both')
            $this->loader()->addAction('comment_form_logged_in_after', $this, 'registerCommentMeta');

        if($this->needLogin == 'no' || $this->needLogin == 'both')
            $this->loader()->addAction('comment_form_after_fields', $this, 'registerCommentMeta');

        $this->registerSaveFunction();
        $this->loader()->addFilter('comment_text', $this, 'modifyCommentText');
    }

    public function saveCommentMeta()
    {
        //Override
    }

    public function modifyCommentText($text)
    {
        //Override
        return $text;
    }

    public function registerSaveFunction()
    {
        $this->loader()->addAction('comment_post', $this, 'saveCommentMetaValue');
    }

    public function saveCommentMetaValue($commentId)
    {
        if($_POST[$this->key]) {
            $value = wp_filter_nohtml_kses($_POST[$this->key]);
            add_comment_meta( $commentId, $this->key, $value );
        }
    }

}