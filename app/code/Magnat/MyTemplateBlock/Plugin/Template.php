<?php

namespace Magnat\MyTemplateBlock\Plugin;

class Template
{
    public function beforeSetTemplate()
    {
        return 'Magnat_MyTemplateBlock::index.phtml';
    }
}
