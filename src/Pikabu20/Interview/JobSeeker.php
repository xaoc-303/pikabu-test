<?php

namespace Pikabu20\Interview;

// PHP 7.2
// Charset: Windows-1251

use Core\Lib\{PrintUtils40 as helper};

/**
 * Класс-стенд с академическими задачами.
 * Небходимо заполнить все пропуски в классе так, чтобы он
 * удовлетворял поставленным assert'ам
 */
class JobSeeker extends \SplFixedArray {

    use helper {test as __toString;}

    public $t25 = 0.0;

    public function __construct() {
        if (get_parent_class($this) !== false) {
            parent::__construct();
            $this->initSkills();
        }
    }

    /**
     * Заполняет экземпляр класса вашими навыками в IT.
     * Пожалуйста, укажите достоверную информацию
     */
    private function initSkills(): void {
        static $skills = 'git,php,mysql,docker,javascript';
        $list = explode(',', $skills);

        $this->setSize(count($list));
        foreach ($list as $i => $v) {
            $this[$i] = $v;
        }
	}

    /**
     * Заменяет в переданном тексте ключевые слова на информацию о вас.
     * Пожалуйста, укажите достоверную информацию
     */
    public function getWelcomeText(string $pattern): string {
        static $myCard = [
            '%name%' => 'Андрей Н.',
            '%age%' => '33 года',
            '%city%' => 'г. Санкт-Петербург',
        ];
        $res = strtr($pattern, $myCard);
        return "$res";
    }
}
