<h1 align="center"> observer </h1>

<p align="center"> 观察者模式.</p>


## Installing

```shell
$ composer require mu/observer -vvv
```

## Usage



```php
# 被观察者
$li_bai = ['title'=>'李白','age'=>9999];

$li_bai['age'] +=1;

$subject = new Subject($li_bai);
# 观察者
$subject->attach(new AgeObserver());

# 执行观察
$subject->notify();

```

AgeObserver.php
```php
use Mu\Observer\Facades\Observer;

class AgeObserver extends Observer {
	public function handle()
	{
		// TODO: Implement handle() method.
		echo '年龄变更：', PHP_EOL;
		echo json_encode($this->getData(), JSON_UNESCAPED_UNICODE), PHP_EOL;
	}
}

```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/mu/observer/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/mu/observer/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT