<?php
/**
 * User: Alexander Kononenko <contact@hauntd.me>
 * Date: 06.05.15
 * Time: 10:51
 */

namespace hauntd\basketjs;

use yii\helpers\Json;
use yii\web\AssetBundle;
use yii\web\View;

class BasketAssetBundle extends AssetBundle
{
    /** @var bool */
    public $useFromCDN = true;

    /** @var string */
    public $sourcePath = '@bower/basket.js';

    /** @var string */
    public $basketJs;

    public function init()
    {
        parent::init();
        $this->initPlugin();
    }

    /**
     * Plugin init
     */
    public function initPlugin()
    {
        if ($this->useFromCDN) {
            $this->basketJs = 'https://cdnjs.cloudflare.com/ajax/libs/basket.js/0.5.2/basket.full.min.js';
        } else {
            $this->basketJs = 'dist/basket.js';
        }
    }

    /**
     * Registers the CSS and JS files with the given view.
     * @param \yii\web\View $view the view that the asset files are to be registered with.
     */
    public function registerAssetFiles($view)
    {
        $manager = $view->getAssetManager();

        foreach ($this->css as $css) {
            $view->registerCssFile($manager->getAssetUrl($this, $css), $this->cssOptions);
        }

        $view->registerJsFile($this->basketJs);

        $jsFiles = [];
        foreach ($this->js as $js) {
            $jsFiles[] = Json::encode(['url' => $manager->getAssetUrl($this, $js)]);
        }

        $view->registerJs(sprintf('basket.require(%s);', implode(",\r\n", $jsFiles)), View::POS_END);
    }
}
