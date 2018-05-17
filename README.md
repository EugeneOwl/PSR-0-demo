# Building project according PSR-0 protocol

  The main idea is to build directories and namespaces system special way to avoid any **require()** [**include()**] calls during creating new models. You build your project according the rules and composer with it's autoload module is going throw the whole hierarchy of the directories which contain your models etc according the instruction in **composer.json** file and require them automatically behind the scenes.
  So the base structure of a project can look this way
```
projectName
    app
        Models
            Controller
            Repository
            Service
            View
    public
        index.php
    tpl
    vendor
        composer
        autoload.php
composer.json
```

  You can create the whole architecture (except vendor directory) manually then write needed instruction to **composer.json** file and than run **composer dump-autoload -o** what will create a vendor directory with autoload file and its modules. Also you can just install ready to use Symfony skeleton instead.
  Than in your heart-controller you just require autoload file and in case you followed the PSR rules you have no need more for reqiuring any files. Also you can use **use** instruction to shorten the length of full class name.
  The instruction in **composer.json** file can look this way
```
{
    "autoload": {
        "psr-0": {
            "Models": "app"
        }
    }
}
```
according psr-0 protocol or this way
```
{
    "autoload": {
        "psr-4": {
            "Models\\": "app/Models"
        }
    }
}
```
according psr-4 protocol.

# P.S.
  Этот проект даже на таком простом уровне уже построен с ошибками. Папка puclic по архитектуре Symfony должна содержать только **index.php** сердечник (не считая стилей, картинок и JS), с которого всегда начинается работа сайта. Именно в нём расположен вызов автозагрузчика, а каждый контроллер запускает автоматически свою главную функцию при загрузке определённого URL. Но поскольку для построения этой изящной архитектуры необходимы как минимум Symfony skeleton и routing, а так же встренные во фреймворк классы абстрактного контроллера с его предопределёнными методами типа **responce()** и прочие такие вещи, я сделал немнго по-кривому, сосредоточившись только на рассмотрении правил PSR.
  
# Вопросы по PHPUnit
1) Для того, чтобы протестировать внутренние **private** функции моделей, мне пришлось ослаблять идентификацию доступности до **public**. Сам понимаю, что это плохо и на практике так не делается. Я думал, что есть некое **PHPUnit**-средство, позволяющее работать с инкапсулированными данными, но в интернете ничего подобного не нашёл.
  Сейчас подумал, быть может нужно впринципе изменить подход к написанию тестов, оставить уровень защиты прежним и просто штурмовать пользовательские **public** функции, через них пытаясь дотянуться до сокрытых внутренних?
2) Стоит ли подходить к написанию тестовых классов кропотливо? Наследевать их, строить их расширяемо, избегать дублирования кода, думать наперёд, как может развиваться модель и впринципе писать тесты «красиво»? Или тест покрывающий 80% ситуаций, как бы уродски на скорую руку написан он не был, априори лучше красивого теста, покрывающего 60%?
  На сколько я понимаю на одну строку модели в реальных проектах приходится порядка четырёх строк класса-тестировщика этой модели (а вероятно и больше), соответственно уровень количества возни с тесьами недооценить сложно.
