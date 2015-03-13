<?php

/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.01.2015
 * Time: 17:17
 */
class ViewDebug
{

    private static $_instance = null;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new ViewDebug();
        }
        return self::$_instance;
    }

    /*Вывод информации о странице*/
    public function viewPageInfo()
    {
        print '<p><font size="10em">Управление режимом <font color="green">отладки</font></font><hr></p>';
        print 'Режим отладки: ';
        $this->viewDebugStatus();
    }

    protected function viewDebugStatus()
    {
        if (DEBUG) {
            print '<b>Включен</b>';
        } else {
            print '<b>Отключен</b>';
        }
    }

    /*Построение интерфейса управления*/
    public function drawCurrentStatus()
    {
        print ('
     <table border="2">
     <form>
<tr>
    <td>Название</td>
    <td>Описание</td>
    <td>Статус</td>
    <td>ВКЛ/ВЫКЛ</td>
  </tr>
  <tr>
  <td>REQUEST_URI</td>
  <td>Отображение URL перехода</td>
  <td>STATUS</td>
  <td><input type="button" name="RP" value="Изменить"></td>
  </tr>
  <tr>
  <td>REQUEST_METHOD</td>
  <td>Отображение метода запроса</td>
  <td>STATUS</td>
  <td><input type="button" name="RM" value="Изменить"></td>
  </tr>
  <tr>
  <td>LOAD_MODULES</td>
  <td>Отображение загруженных модулей</td>
  <td>STATUS</td>
  <td><input type="button" name="LM" value="Изменить"></td>
  </tr>
  </form>
</table>
     ');
    }

    public function ViewRequest()
    {
        if (DEBUG) {
            if (DG_REQUESTMETHOD) {
                print '<br><font color="red" face="Arial"> REQUEST METHOD:<b> ' . $_SERVER["REQUEST_METHOD"] . '</b></font>';
                print '<br><font color="red" face="Arial"> REQUEST URI:<b> ' . $_SERVER["REQUEST_URI"] . '</b></font><br><br>';
            } else {
                print 'Вывод request method & URI отключен';
            }
        }
    }

    public function viewIncludeModules($loader)
    {
        if (DEBUG) {
            if (DG_LOADMODULES) {
                if ($loader) {
                    print'<font  size="5px">Следующие модули <font color="green" face="Arial">загружены:</font></font><br>';
                    $includeModules = Loader::getInstance();
                    $mas = $includeModules->getPlug();
                    $i = 0;
                    while ($i != count($mas)) {
                        print '<br><font size = "4px"> ' . $mas[$i] . '</font>';
                        $i++;
                    }
                } else {
                    print '<font color="#ff00ff" face="Arial" size="5px">Modules NO LOAD!</font><br>';
                }
            } else {
                print 'Вывод загруженных модулей отключен';
            }
        }
    }
}