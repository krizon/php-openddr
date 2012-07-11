<?php

namespace OpenDDR\Model;

class Browser extends BuiltObject
{
    private $majorRevision = '0';
    private $minorRevision = '0';
    private $microRevision = '0';
    private $nanoRevision = '0';

    public function __construct(array $properties = array())
    {
        parent::__construct(0, $properties);
    }

    public function getCookieSupport()
    {
        return parent::get('cookieSupport');
    }

    public function getDisplayHeight()
    {
        return (int)parent::get('displayHeight');
    }

    public function getDisplayWidth()
    {
        return (int)parent::get('displayWidth');
    }

    public function getImageFormatSupport()
    {
        return parent::get('imageFormatSupport');
    }

    public function getInputModeSupport()
    {
        return parent::get('inputModeSupport');
    }

    public function getMarkupSupport()
    {
        return parent::get('markupSupport');
    }

    public function getModel()
    {
        return parent::get('model');
    }

    public function getScriptSupport()
    {
        return parent::get('scriptSupport');
    }

    public function getStylesheetSupport()
    {
        return parent::get('stylesheetSupport');
    }

    public function getVendor()
    {
        return parent::get('vendor');
    }

    public function getVersion()
    {
        return parent::get('version');
    }

    public function getRenderer()
    {
        return parent::get('layoutEngine');
    }

    public function getRendererVersion()
    {
        return parent::get('layoutEngineVersion');
    }

    public function getClaimedReference()
    {
        return parent::get('referencedBrowser');
    }

    public function getClaimedReferenceVersion()
    {
        return parent::get('referencedBrowserVersion');
    }

    public function getBuild()
    {
        return parent::get('build');
    }

    public function setCookieSupport($cookieSupport)
    {
        parent::putProperty('cookieSupport', $cookieSupport);
    }

    public function setDisplayHeight($displayHeight)
    {
        parent::putProperty('displayHeight', $displayHeight);
    }

    public function setDisplayWidth($displayWidth)
    {
        parent::putProperty('displayWidth', $displayWidth);
    }

    public function setImageFormatSupport($imageFormatSupport)
    {
        parent::putProperty('imageFormatSupport', $imageFormatSupport);
    }

    public function setInputModeSupport($inputModeSupport)
    {
        parent::putProperty('inputModeSupport', $inputModeSupport);
    }

    public function setMarkupSupport($markupSupport)
    {
        parent::putProperty('markupSupport', $markupSupport);
    }

    public function setModel($model)
    {
        parent::putProperty('model', $model);
    }

    public function setScriptSupport($scriptSupport)
    {
        parent::putProperty('scriptSupport', $scriptSupport);
    }

    public function setStylesheetSupport($stylesheetSupport)
    {
        parent::putProperty('stylesheetSupport', $stylesheetSupport);
    }

    public function setVendor($vendor)
    {
        parent::putProperty('vendor', $vendor);
    }

    public function setVersion($version)
    {
        parent::putProperty('version', $version);
    }

    //utility setter for significant oddr browser properties
    public function setLayoutEngine($layoutEngine)
    {
        parent::putProperty('layoutEngine', $layoutEngine);
    }

    public function setLayoutEngineVersion($layoutEngineVersion)
    {
        parent::putProperty('layoutEngineVersion', $layoutEngineVersion);
    }

    public function setReferenceBrowser($referenceBrowser)
    {
        parent::putProperty('referenceBrowser', $referenceBrowser);
    }

    public function setReferenceBrowserVersion($referenceBrowserVersion)
    {
        parent::putProperty('referenceBrowserVersion', $referenceBrowserVersion);
    }

    public function setBuild($build)
    {
        parent::putProperty('build', $build);
    }

    public function __toString()
    {

    }
}