# События

Класс - EventManager

## Подписка на события

Рекомендуем подписываться на события в методе *onApplicationRun* в модуле.

Подписка на событие (мне кажется, понятно и без объяснений):

```php
Phact::app()->event->on('beforeLogin', function($sender, $user) {
    
});
```

Третьим входящим параметром в метод *on* можно указать класс отправителя события. 

Это может быть удобно, если событие может применяться для различных объектов.


## Вызовы событий

```php
Phact::app()->event->trigger('beforeLogin', [$user]);
```

```php
Phact::app()->event->trigger('someEvent', [$firstParam, $secondParam], $sender);
```

## Встроенные события

**application.beforeInit** - $sender - экземпляр Application, $params - []

**application.afterInit** - $sender - экземпляр Application, $params - []

**application.beforeRun** - $sender - экземпляр Application, $params - []

**application.beforeEnd** - $sender - экземпляр Application, $params - []

**application.beforeRunController** - $sender - экземпляр Application, $params - [$controller, $action, $routeName, $routeParams], где $controller - экземпляр Controller, $action - имя action, $routeName - имя route (н-р: "user:login"), $params - параметры route

**application.afterRunController** - $sender - экземпляр Application, $params - [$controller, $action, $routeName, $routeParams, $actionResponse], где $controller - экземпляр Controller, $action - имя action, $routeName - имя route (н-р: "user:login"), $params - параметры route, $actionResponse - данные, вернувшиеся из action

**router.beforeMatch** - $sender - экземпляр Router, $params - [$requestUrl, $requestMethod]

**router.afterMatch** - $sender - экземпляр Router, $params - [$requestUrl, $requestMethod, $matches]

**controller.beforeAction** - $sender - экземпляр Controller, $params - [$prepared, $raw], где $prepared - подготовленные параметры в том порядке, которые принимает action, а $raw - параметры, как они пришли из Router

**controller.afterAction** - $sender - экземпляр Controller, $params - [$prepared, $raw, $response], где $prepared - подготовленные параметры в том порядке, которые принимает action, а $raw - параметры, как они пришли из Router, $response - возвращенное значение из action

**model.beforeInsert** - $sender - экземпляр Model, $params - []

**model.afterInsert** - $sender - экземпляр Model, $params - []

**model.beforeUpdate** - $sender - экземпляр Model, $params - []

**model.afterUpdate** - $sender - экземпляр Model, $params - []

**model.beforeDelete** - $sender - экземпляр Model, $params - []

**model.afterDelete** - $sender - экземпляр Model, $params - []

**model.beforeSave** - $sender - экземпляр Model, $params - []

**model.afterSave** - $sender - экземпляр Model, $params - []

**template.beforeRender** - $sender - экземпляр TemplateManager, $params - [$template, $templateParams], где $template - имя шаблона, $templateParams - параметры для отрисовки шаблона

**template.afterRender** - $sender - экземпляр TemplateManager, $params - [$template, $templateParams, $result], где $template - имя шаблона, $templateParams - параметры для отрисовки шаблона, $result - результат отрисовки шаблона