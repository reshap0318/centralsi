<?php

namespace App\Helpers;


class CoreUI
{
    private $_icon;
    private $_text;
    private $_message;

    public function __construct()
    {
    }

    public function init()
    {
        $this->_text = null;
        $this->_icon = null;
        $this->_message = null;
    }

    public function icon($icon)
    {
        $this->_icon = $icon;
        return $this;
    }

    public function text($text)
    {
        $this->_text = $text;
        return $this;
    }

    public function message($msg)
    {
        $this->_message = $msg;
        return $this;
    }

    public function button($url = "")
    {
        return "<a href='$url' class='btn btn-sm btn-info'><i class='fa $this->_icon'>$this->_text</i></a>";
    }

    public function button_edit($url)
    {
        $this->_icon = 'fa-pencil-alt';
        return $this->button($url);
    }

    public function button_delete($url, $message)
    {
        $str = "";
        $str .= Form::open(array(
            'style' => 'display: inline-block;',
            'method' => 'DELETE',
            'onsubmit' => "return confirm('$message');",
            'url' => $url));
        $str .= Form::button('<i class="fa fa-trash"></i>'. $this->_text, ['class' => 'btn btn-sm btn-danger', 'type' => 'submit']);
        $str .= Form::close();

        return $str;
    }

    public function toolbar($url)
    {
        return '<a class="btn" href="'.$url.'"> <i class="'.$this->_icon.'"></i> &nbsp;'.$this->_text.'</a>';
    }

    public function breadcrumb($levels)
    {
        $results = '';
        $n = count($levels);
        $i = 1;
        foreach ($levels as $menu => $url)
        {
            if($i == $n){
                $results .= '<li class="breadcrumb-item active">' . $menu . '</li>';
            }else {
                $results .= '<li class="breadcrumb-item"><a href="' . $url . '">' . $menu . '</a></li>';
            }
            $i++;
        }
        return $results;
    }

    public function toolbar_button($url, $icon, $text = null){
        return '<a class="btn" href="'.$url.'"> <i class="'.$icon.'"></i> &nbsp;'.$text.'</a>';
    }

}