<?php

$notesTemplate = [
    'template1' => '<div>Moje średnie ocen w miesiącu:'."<!--cena-->, ilosc: <!--ilosc--></div>"
];

$database = [
    'cena' => 20,
    'ilosc' => 10
];

class notesMiniSystem{
    public function __construct($data, $template) {
        $this->data = $data;
        $this->template = $template;
    }

    function replaceData($data, $theme){
        $result = $theme;

        foreach($data as $key=>$value){
            $result = str_replace('<!--'.$key.'-->',' '.$value, $result);
        }
        $result = preg_replace('/<!--.*?-->/', '', $result);
        return $result;
    }

    function printTemplate(){
        echo $this->replaceData($this->data, $this->template);
    }
}

$system = new notesMiniSystem($database, $notesTemplate['template1']);
$system->printTemplate();