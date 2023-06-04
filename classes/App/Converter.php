<?php

namespace JsonCoverter\App;

use JsonCoverter\Helpers\FrontHelpers;

class Converter
{

    private array $arTags = [
        'container' => [
            'tag' => 'div',
            'class' => 'container',
            'closed' => 'Y'
        ],
        'text' => [
            'tag' => 'p',
            'closed' => 'Y'
        ],
        'block' => [
            'tag' => 'div',
            'closed' => 'Y'
        ],
        'button' => [
            'tag' => 'a',
            'closed' => 'Y'
        ],
        'image' => [
            'tag' => 'img',
            'closed' => 'N'
        ]
    ];

    private array $arPayloads = [
        'link' => [
            'attribute' => 'href',
            'value' => 'payload'
        ],
        'image' => [
            'attribute' => 'src',
            'value' => 'url'
        ]
    ];

    public function jsonToHtml($arHtml): string
    {
        $sAttribute = '';
        $sStyle = '';

        if ($arHtml['payload']) {
            $sAttribute = $this->getPayloadAttributes($arHtml['payload']);
        }
        if ($arHtml['parameters']) {
            $sStyle = $this->getStyles($arHtml['parameters']);
        }

        $sHtml = "<{$this->arTags[$arHtml['type']]['tag']} {$sStyle} {$this->getClassName($arHtml)} {$sAttribute}>";

        if (isset($arHtml['payload']['text'])) {
            $sHtml .= $arHtml['payload']['text'];
        }

        if ($arHtml['children'] && count($arHtml['children']) > 0) {
            foreach ($arHtml['children'] as $arChild) {
                $sHtml .= $this->jsonToHtml($arChild);
            }
        }

        if ($this->arTags[$arHtml['type']]['closed'] == 'Y') {
            $sHtml .= "</{$this->arTags[$arHtml['type']]['tag']}>";
        }

        return $sHtml;
    }

    private function getPayloadAttributes($arPayload): string
    {
        $sAttribute = '';

        foreach ($arPayload as $sKey => $arValue) {
            if ($this->arPayloads[$sKey] && $arValue) {
                $sAttribute = "{$this->arPayloads[$sKey]['attribute']}='{$arValue[$this->arPayloads[$sKey]['value']]}'";
            }
        }

        return $sAttribute;
    }

    private function getStyles($arParameters): string
    {
        $sStyles = "style='";

        foreach ($arParameters as $sKey => $sParameter) {
            $sKey = FrontHelpers::formatCase($sKey);
            $sStyles .= "{$sKey}: {$sParameter};";
        }

        return $sStyles."'";
    }

    private function getClassName($arHtml): string
    {
        return $this->arTags[$arHtml['type']]['class'] ? "class='{$this->arTags[$arHtml['type']]['class']}'" : '';
    }

}