在 core 创建模型的基类，模型最接近数据的，数据层，controller 持有 model，
- 加载数据，加载数据就是将数据读取到模型，例如用户提交或者从数据读取
- 模型结构是按数据库表结构定义，还是表单结构
- 校验数据，这里主要校验表单传递过来的数据格式是否正确

```php

namespace app\core;

abstract class Model{
    public function loadData($data)
    {
        foreach ($data as $key => $value){
            if(property_exists($this,$key)){
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules();


    public function validate(){

    }
}
```