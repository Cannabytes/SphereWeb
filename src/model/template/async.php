<?php

namespace Ofey\Logan22\model\template;

use Ofey\Logan22\template\tpl;

class async {

    public array $blocks = [];
    private $fileTpl;
    private array $clearForm = [];
    private array $changeVal = [];
    private array $changeText = [];
    private array $JSCode = [];


    //Название шаблона
    public function __construct($name) {
        $this->fileTpl = $name;
    }

    public function get_fileTpl() {
        return $this->fileTpl;
    }

    //Какие поля в HTML мы будем заменять (isID - это ID или класс)
    //$name по умолчанию main-container
    public function block($name = "main-container", $blockName = "content", $action = "update", $isID = false): void {
        $this->blocks[] = [
            "name" => $name,
            "html" => $blockName,
            "action" => $action,
            "isID" => $isID,
        ];
    }

    //Заменяет содержимое элемента на новое
    public function changeVal($element, $value, $isID = false): void {
        $this->changeVal[] = [
            "name" => $element,
            "value" => $value,
            "isID" => $isID,
        ];
    }

    public function SetURL($url): void {
        $this->JSCode[] = "window.history.pushState(null, null, '{$url}');";
    }

    public function JSCode($code): void {
        $this->JSCode[] = $code;
    }


    //Какие поля в HTML мы будем очищать (isID - это ID или класс)
    public function clearForm($name, $isID = false): void {
        $this->clearForm[] = [
            "name" => $name,
            "type" => "input", // "input" or "file"
            "isID" => $isID, // "id" or "class
        ];
    }

    public function getArray(): array {
        return [
            "ok" => true,
            "blockLoad" => true,
            "blocks" => $this->blocks,
            "clearForm" => $this->clearForm,
            "changeVal" => $this->changeVal,
            "changeText" => $this->changeText,
            "JSCode" => $this->JSCode,
        ];
    }

    public function send() {
        tpl::getHTML($this);
    }

    public function changeText($element, $value, $isID = false): void {
        $this->changeText[] = [
            "name" => $element,
            "value" => $value,
            "isID" => $isID,
        ];
    }


}