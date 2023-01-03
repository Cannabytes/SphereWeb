<?php
/**
 * Created by Logan22
 * Github -> https://github.com/Cannabytes/TrashWeb
 * Date: 02.01.2023 / 5:44:19
 */

namespace Ofey\Logan22\component\request;

class request_config {


    /**
     * @var bool
     * True - проверяем на верность электронную почту
     */
    private bool $isEmail;
    /**
     * @var string
     * Задаем свои правила обработки строки по регулярному выражению
     * Пример: "/^[a-zA-Z0-9]+$/"
     */
    private string $rules;
    /**
     * @var bool
     * Обязательное ли поле к заполнению
     */
    private bool $required;
    /**
     * @var bool
     * Проверяем, является ли строка числом
     */
    private bool $isNumber;
    /**
     * @var int
     * Задается минимальное значение числа
     */
    private int $minValue;
    /**
     * @var int
     * Задается максимальное значение числа
     */
    private int $maxValue;
    /**
     * Минимальное количество символов в строке
     *
     * @var int
     */
    private int $min;
    /**
     * Минимальное количество символов в строке
     *
     * @var int
     */
    private int $max;


    public function __construct(int $min = 4, int $max = 16, int $minValue = -2 ** 31 + 1, int $maxValue = 2 ** 31 - 1, bool $isNumber = false, bool $required = true, bool $isEmail = false, string $rules = "",) {
        $this->min = trim($min);
        $this->max = trim($max);
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->isNumber = $isNumber;
        $this->required = $required;
        $this->isEmail = $isEmail;
        $this->rules = $rules;
    }

    /**
     * @return int
     */
    public function getMin(): int {
        return $this->min;
    }

    /**
     * @param int $min
     */
    public function setMin(int $min): void {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMax(): int {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): void {
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getMinValue(): int {
        return $this->minValue;
    }

    /**
     * @param int $minValue
     */
    public function setMinValue(int $minValue): void {
        $this->minValue = $minValue;
    }

    /**
     * @return int
     */
    public function getMaxValue(): int {
        return $this->maxValue;
    }

    /**
     * @param int $maxValue
     */
    public function setMaxValue(int $maxValue): void {
        $this->maxValue = $maxValue;
    }

    /**
     * @return bool
     */
    public function isNumber(): bool {
        return $this->isNumber;
    }

    /**
     * @param bool $isNumber
     */
    public function setIsNumber(bool $isNumber): void {
        $this->isNumber = $isNumber;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getRules(): string {
        return $this->rules;
    }

    /**
     * @param string $rules
     */
    public function setRules(string $rules): void {
        $this->rules = $rules;
    }

    /**
     * @return bool
     */
    public function isEmail(): bool {
        return $this->isEmail;
    }

    /**
     * @param bool $isEmail
     */
    public function setIsEmail(bool $isEmail): void {
        $this->isEmail = $isEmail;
    }
}