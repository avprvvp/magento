<?php

namespace Magnat\MultiselectAttribute\Model\Attribute\Frontend;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;
use Magento\Framework\DataObject;

class Style extends AbstractFrontend
{
    public function getValue(DataObject $object)
    {
        $result = "";
        $attr = $object->getData($this->getAttribute()->getAttributeCode());
        $attrOption = $this->getOption($attr);

        if (is_string($attrOption)) {
            $result = $attrOption;
        } else {
            foreach ($attrOption as $option) {
                $result = $result . '<li><b>' . $option . '</b></li>';
            }
        }

        return '<ul>' . $result . '</ul>';
    }
}
