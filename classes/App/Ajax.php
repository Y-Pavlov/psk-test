<?php

namespace JsonCoverter\App;

class Ajax
{

    private mixed $arData;
    private Converter $obConverter;

    public function __construct()
    {
        $this->arData = json_decode(file_get_contents($_FILES['file']['tmp_name']), true);
        $this->obConverter = new Converter();
    }

    public function execute(): string
    {
        $sResponse = '';
        if ($this->arData) {
            $sResponse = $this->convert();
        }

        return $sResponse;
    }

    private function convert(): string
    {
        return $this->obConverter->jsonToHtml($this->arData);
    }
}