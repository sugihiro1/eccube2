<?php
namespace Plugin\ZaifPayment\ServiceProvider;

use Eccube\Application;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Plugin\ZaifPayment\Form\Type\ZaifPaymentConfigType;
use Symfony\Component\Yaml\Yaml;

class ZaifPaymentServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        // Setting on Plugin List
        $app->match('/' . $app["config"]["admin_route"] . '/plugin/ZaifPayment/config', 'Plugin\ZaifPayment\Controller\ConfigController::edit')->bind('plugin_ZaifPayment_config');

        // Payment on Shop site
        $app->match('/shopping/cm_btc_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('cm_btc_payment');
        $app->match('/shopping/cm_eth_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('cm_eth_payment');
        $app->match('/shopping/cm_bch_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('cm_bch_payment');
        $app->match('/shopping/cm_xmall_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('cm_xmall_payment');
        $app->match('/shopping/zaif_btc_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('zaif_btc_payment');
        $app->match('/shopping/zaif_mona_payment', 'Plugin\ZaifPayment\Controller\PaymentController::index')->bind('zaif_mona_payment');
        $app->match('/shopping/zaif_payment/back', 'Plugin\ZaifPayment\Controller\PaymentController::goBack')->bind('zaif_payment_back');
        $app->match('/shopping/cm_payment/back', 'Plugin\ZaifPayment\Controller\PaymentController::goBack')->bind('cm_payment_back');

        // Form for Setting on Plugin List
        $app['form.types'] = $app->share($app->extend('form.types', function ($types) use ($app) {
            $types[] = new ZaifPaymentConfigType($app);
            return $types;
        }));

        // Repository
        $app['eccube.plugin.repository.zaif_payment'] = $app->share(function () use ($app) {
            return $app['orm.em']->getRepository('Plugin\ZaifPayment\Entity\ZaifPayment');
        });

        // Service
        $app['eccube.plugin.service.zaif_payment'] = $app->share(function () use ($app) {
            return new \Plugin\ZaifPayment\Service\ZaifPaymentService($app);
        });

        // Message
        $app['translator'] = $app->share($app->extend('translator', function ($translator, \Silex\Application $app) {
            $translator->addLoader('yaml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
            $file = __DIR__ . '/../Resource/locale/message.' . $app['locale'] . '.yml';
            if (file_exists($file)) {
                $translator->addResource('yaml', $file, $app['locale']);
            }
            return $translator;
        }));

        // load config
        $conf = $app['config'];
        $app['config'] = $app->share(function () use ($conf) {
            return $conf;
        });

        // ログファイル設定
        $app['monolog.zaif.payment'] = $app->share(function ($app) {

            $logger = new $app['monolog.logger.class']('zaif.payment.client');

            $file = $app['config']['root_dir'] . '/app/log/zaifpayment.log';
            $RotateHandler = new RotatingFileHandler($file, $app['config']['log']['max_files'], Logger::INFO);
            $RotateHandler->setFilenameFormat(
                'zaifpayment_{date}',
                'Y-m-d'
            );

            $logger->pushHandler(
                new FingersCrossedHandler(
                    $RotateHandler,
                    new ErrorLevelActivationStrategy(Logger::INFO)
                )
            );

            return $logger;
        });
    }

    public function boot(BaseApplication $app)
    {
    }
}
